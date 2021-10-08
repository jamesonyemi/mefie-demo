<select 
    id="clientid" 
    name="clientid" 
    class="form-control selectpicker" 
    data-live-search="true" required >
    <option value="" disabled>---select---</option>
        @foreach ($clients as $key => $client)
        <?php $client_fullname = ucwords( ($client->client_name)) ?>
        <option 
        class="text-capitalize"
        value="{{ $client->id}}"
        {{ ( in_array($client->id, @$project))  ? 'disabled' : '' }}
        data-content="{{  
        ( in_array($client->id, @$project))  ? '<del>'.$client_fullname.'</del>' 
                                : $client->client_name }}   " >
                                
        {{ !empty($client_fullname) ? $client_fullname : "" }}
    </option>
    @endforeach
</select>