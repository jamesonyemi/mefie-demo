<select 
    id="clientid" 
    name="clientid" 
    class="form-control selectpicker show-tick text-capitalize" 
    data-live-search="true" required >
    <option value="" disabled>---select---</option>
        @foreach ($clients as $key => $client)
        <?php $client_full_name = ucwords( ($client->client_name)) ?>
        <option 
        class="text-capitalize"
        value="{{ $client->clientid}}"
        {{ ( in_array($client->clientid, @$project))  ? 'disabled' : '' }}
        data-content="{{  
        ( in_array($client->clientid, @$project))  ? 
            '<span class="badge badge-danger"><del>'.$client_full_name .'</del>
                    </span>'.'<span class="ml-1 badge badge-info text-lowercase"> assigned
                        <i class="bx bx-badge-check"></i></span>'
                        
        : ucwords($client->client_name) }}   " >
                                
        {{ !empty($client_full_name) ? ucwords($client_full_name) : "" }}
    </option>
    @endforeach
</select>
