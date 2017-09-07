<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MatchController extends Controller
{
    //
    public function matchcron()
    {
    	// $candid=CandidateProfile::all();
    	// return $candid;
    	$candid= \DB::table('candidate_profile')->join('candidate_signup','profile_candidate_id','=','candidate_id')->select('*')->get();
    	$jobd=\DB::table('job_details')->join('employer_signup','employer_signup.employer_id','=','job_details.employer_id')->select('*')->get();
    	foreach($candid as $candidate)
    	{
    		foreach ($jobd as $job) {
    			if($candidate->profile_status=='A')
    			{
    				$excluded_company=$candidate->exclude_companies;
    				$excluded_company=explode(',',$excluded_company);
    				if(!in_array($job->company_name,$excluded_company))
    				{
    						echo $job->id;
    						echo '<br>';
    						echo $job->employer_id;
    						echo '<br>';
    						echo $candidate->candidate_id;
    						echo '<hr>';
    				}

    			}
    		}
    	}


    }
}
