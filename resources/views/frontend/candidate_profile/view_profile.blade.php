@include('layouts.app')
<style>
    .gameplay-baseball-field {
        margin-left: 341px;
    }
</style>
<script src="{{asset("/plugins/jquery-validation/js/jquery.validate.min.js")}}" type="text/javascript"></script>
<script src="{{asset("/plugins/jquery-validation/js/additional-methods.min.js")}}" type="text/javascript"></script>
<div class="row">
    <div class="portlet-body">
        <form method="post" class="form-horizontal" id="candidate_profile_add" action="{{url('insert_candidate_profile')}}" enctype="multipart/form-data" files=true>
            {{ csrf_field() }}
            
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-body">
                 <div class="form-group">
                    <label class="control-label col-md-3">Profile 
                    </label>
                    <div class="radio">
                        <label><input type="radio" name="profile_status" value="A" checked>Active</label>
                        <label><input type="radio" name="profile_status" value="I" @if(!is_null($candidate_profile) && $candidate_profile['profile_status']=='I') checked @endif>Deactivate</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Actively looking 
                    </label>
                    <div class="radio">
                        <label><input type="radio" name="actively_looking" value="1" checked>Yes</label>
                        <label><input type="radio" name="actively_looking" value="0" @if(!is_null($candidate_profile) && $candidate_profile['actively_looking']==0) checked @endif>No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Interested in
                    </label>
                    <div>
                        <div class="checbox">
                             @foreach($product_management_type as $product_m)
                                @php
                                    $checked='';
                                @endphp
                              
                                @foreach($interests as $candidate_i)
                                    @if($candidate_i->id == $product_m->id)
                                        @php
                                            $checked='checked';
                                        @endphp
                                    @endif
                                @endforeach                                        
                                
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="interest_in[]" {{$checked}} value="{{$product_m->id}}">{{$product_m->name}}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">PM experience in years
                    </label>
                    <div class="radio">
                        
                        @foreach($pm_experiences as $pm_experience)
                               @php
                                    $checked='';
                                @endphp
                                @if(is_null($pm_exp) && $pm_experience->id==1)
                                    @php
                                        $checked='checked';
                                    @endphp
                                @elseif($pm_exp == $pm_experience->id)
                                    @php
                                        $checked='checked';
                                    @endphp
                                @else
                                @php
                                    $checked='';
                                @endphp 
                                @endif
                                <label><input type="radio" value="{{$pm_experience->id}}" name="pm_experience_in_years" {{$checked}} >{{$pm_experience->name}}</label>
                        @endforeach        
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Job level
                    </label>
                    <div class="radio">
                        <label><input type="radio" name="job_level"  value="entry" checked>Entry</label>
                        <label><input type="radio" name="job_level" value="mid_level" @if($candidate_profile['job_level']=='mid_level') checked @endif>Mid-level</label>
                        <label><input type="radio" name="job_level" value="senior_level" @if($candidate_profile['job_level']=='senior_level') checked @endif>Senior level</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Expected Base Salary Per annum in USD
                    </label>
                    <div class="col-md-4">
                        <input name="expected_salary" value="{{$candidate_profile['expected_salary']}}" type="text" id="expected_salary" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Domains
                    </label>
                    <div class="checbox col-md-8">
                        @foreach($domains as $domain)
                                @php
                                    $checked='';
                                @endphp
                              
                                @foreach($candidate_domains as $candidate_domain)
                                    @if($candidate_domain->id == $domain->id)
                                        @php
                                            $checked='checked';
                                        @endphp
                                    @endif
                                @endforeach
                        
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="domains[]" {{ $checked }} value="{{$domain->id}}">{{$domain->name}}
                                </label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Exclude Companies
                    </label>
                    <div class="col-md-4">
                        <input name="exclude_company"  value="{{$candidate_profile['exclude_companies']}}" type="text" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Authorized to work in US
                    </label>
                    <div class="radio">
                        <label><input type="radio" name="authorized_to_work_in_us" value="1" checked>Yes</label>
                        <label><input type="radio" name="authorized_to_work_in_us" value="0" @if(!is_null($candidate_profile) && $candidate_profile['authorized_to_work_in_us']==0) checked @endif >No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Need Sponsorship for employment Visa status
                    </label>
                    <div class="radio">
                        <label><input type="radio" name="need_sponsorship_for_employment_visa_status" value="1" checked>Yes</label>
                        <label><input type="radio" name="need_sponsorship_for_employment_visa_status" value="0" @if(!is_null($candidate_profile) && $candidate_profile['need_sponsorship']==0) checked @endif >No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Relocation required ?
                    </label>
                    <div class="radio">
                        <label><input type="radio" name="relocation_required" value="1" checked>Yes</label>
                        <label><input type="radio" name="relocation_required" value="0" @if(!is_null($candidate_profile) && $candidate_profile['relocation_required']==0) checked @endif>No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Willing to relocate ?
                    </label>
                    <div class="radio">
                        <label><input type="radio" name="willing_to_relocate" value="1" checked>Yes</label>
                        <label><input type="radio" name="willing_to_relocate" value="0" @if(!is_null($candidate_profile) && $candidate_profile['willing_to_relocate']==0) checked @endif>No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Resume <br><span style="font-weight: lighter;">(File extension must be either pdf, doc, or docx)</span>
                    </label>
                    <div class="col-md-4">
                        <div><input name="resume" type="file" id="resumeInputFile" ></div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" name="cmdSubmit" value="submit" class="btn green">Submit</button>
                            <a href="{{url('/')}}" class="btn grey-salsa btn-outline">Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
        </form> 

    </div>
</div>
<script>

$(document).ready(function ()
{
    $('#candidate_profile_add').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        rules: {
            expected_salary: {
                required: true,
                number: true

            },
            resume:{
                    extension: "pdf|docx|doc"
                    },
            "domains[]": { 
                    required: true, 
                    minlength: 1 
            },
            "interest_in[]":{
                    required: true, 
                    minlength: 1 
            }
        },
        messages: {
            expected_salary: {
                required: "Please Enter Expected Base Salary Per annum in USD ",
                number: "Decimal Numbers Only"
            },
            "domains[]": {
                required:"Please select at least one Domain." 
                },
               "interest_in[]":{
                  required:"Please select at least one Interested in."    
               },
            resume:{                
                  extension:"Please only select pdf, doc, or docx file"
                  },
        }
    });
});

</script>