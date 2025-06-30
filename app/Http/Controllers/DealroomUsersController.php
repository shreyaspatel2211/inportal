<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use App\Models\DealRoom;
use Illuminate\Support\Facades\Mail;
use App\Mail\DealroomInviteMail;
use App\Models\User;
use App\Models\Business;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;



class DealroomUsersController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

        event(new BreadDataAdded($dataType, $data));
        // Send to Investors (users)
        if ($request->has('deal_room_belongstomany_user_relationship')) 
        {
            $userIds = $request->input('deal_room_belongstomany_user_relationship');
            $users = User::whereIn('id', $userIds)->get();

            $emails = [];

            foreach ($users as $user) {
                if (!empty($user->email)) {
                    $emails[] = $user->email;
                    Mail::to($user->email)->send(new DealroomInviteMail($data, $user, 'investor'));
                }
            }
        }

        // Send to Businesses
        if ($request->has('business_id')) 
        {
            $business = Business::find($request->input('business_id'));
            if ($business && !empty($business->email)) {
                Mail::to($business->email)->send(new DealroomInviteMail($data, $business, 'business'));
            }
        }

        if (!$request->has('_tagging')) {
            if (auth()->user()->can('browse', $data)) {
                $redirect = redirect()->route("voyager.{$dataType->slug}.index");
            } else {
                $redirect = redirect()->back();
            }

            return $redirect->with([
                'message'    => __('voyager::generic.successfully_added_new')." {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
        } else {
            return response()->json(['success' => true, 'data' => $data]);
        }
        dd($request);
    }

}
