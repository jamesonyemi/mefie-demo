<select 
    id="clientid" 
    name="clientid" 
    class="form-control selectpicker show-tick" 
    data-live-search="true" required >
    <option value="" disabled>---select---</option>
        @foreach ($clients as $key => $client)
        <?php $client_full_name = ucwords( ($client->client_name)) ?>
        <option 
        class="text-capitalize"
        value="{{ $client->id}}"
        {{ ( in_array($client->id, @$project))  ? 'disabled' : '' }}
        data-content="{{  
        ( in_array($client->id, @$project))  ? '<span class="badge badge-danger"><del>'.$client_full_name .'</del></span>' 
                                : $client->client_name }}   " >
                                
        {{ !empty($client_full_name) ? $client_full_name : "" }}
    </option>
    @endforeach
</select>
