@include('layouts.app')
<div class="container">
    <div class="row">
        <div class="portlet-body">
            <div style="width:60%;float:left;">
                <form method="post" class="form-horizontal" id="frm_job_add" action="">
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
                            <label class="control-label col-md-3">Job Title
                            </label>
                            <div class="radio">
                                {{$job['title']}}
                            </div>
                            <div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Job Location
                            </label>
                            <div class="radio">
                                {{$job['location']}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Job Type
                            </label>
                            <div class="radio">
                                @foreach($domains as $domain)
                                {{$domain->name}}
                                @if (!$loop->last)
                                {{ '&nbsp;&nbsp;|&nbsp;&nbsp;' }}
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Job level
                            </label>
                            <div class="radio">
                                {{$job['level']}}
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Annual Salary range in USD</label>
                            <div class="radio">
                                {{$job['annual_salary']}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Preferred Domain experience
                            </label>
                            <div class="checbox col-md-8">
                                <div class="radio">
                                    @foreach($pm_experiences as $domain)
                                    {{$domain->name}}
                                    @if (!$loop->last)
                                    {{ '&nbsp;&nbsp;|&nbsp;&nbsp;' }}
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Job Description
                            </label>
                            <div class="radio">
                                {{$job->description}}
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div style="width:35%;float:left;">
                <div class="col-md-12">
                    <strong>Candidates Pending for review</strong>
                    @if(!empty($pending->toArray()))
                    @foreach($pending as $pnd)
                    @foreach($pnd['candidate_signup'] as $c_d)
                    <br>
                    <a href="{{url('employer_candidate_profile/'.$pnd['id'].'/'.$job->id)}}">{{$c_d['firstname']." ".$c_d['lastname']}}</a>                         
                    @endforeach
                    @endforeach
                    @else
                    <br>
                    0
                    @endif  
                </div>
                <div class="col-md-12">
                    <strong>Candidates Active in Interview Phase</strong>
                    @if(!empty($active->toArray()))
                    @foreach($active as $pnd)
                    @foreach($pnd['candidate_signup'] as $c_d)
                    <br>
                    <a href="{{url('employer_candidate_profile/'.$pnd['id'].'/'.$job->id)}}">{{$c_d['firstname']." ".$c_d['lastname']}}</a>
                    @endforeach
                    @endforeach
                    @else
                    <br>
                    0
                    @endif
                </div>
                <div class="col-md-12">
                      <strong>Candidates not considered </strong>
                        @if(!empty($process->toArray()))
                        @foreach($process as $pnd)
                        @foreach($pnd['candidate_signup'] as $c_d)
                        <br>
                        <a href="{{url('employer_candidate_profile/'.$pnd['id'].'/'.$job->id)}}">{{$c_d['firstname']." ".$c_d['lastname']}}</a>
                        @endforeach
                        @endforeach
                        @else
                         <br>
                        0
                        @endif
                    </div>
                <div class="col-md-12">
                    <strong>Candidates Rejected</strong>
                    @if(!empty($rejected->toArray()))
                    @foreach($rejected as $pnd)
                    @foreach($pnd['candidate_signup'] as $c_d)
                    <br>
                    <a href="{{url('employer_candidate_profile/'.$pnd['id'].'/'.$job->id)}}">{{$c_d['firstname']." ".$c_d['lastname']}}</a>
                    @endforeach
                    @endforeach
                    @else  
                    <br>
                    0
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>