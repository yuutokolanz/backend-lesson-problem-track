<?php

namespace database\Populate;

use App\Models\Problem;

class ProblemsPopulate {
    public static function populate(): void {
        $numberOfProblems = 100;

        for ($i=0; $i < $numberOfProblems; $i++) { 
            $problem = new Problem(title: 'Problem ' . $i);
            $problem->save();
        }

        echo "Problems populated with $numberOfProblems registers \n";
    }
}