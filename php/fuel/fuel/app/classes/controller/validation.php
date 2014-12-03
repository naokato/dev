<?php

class Controller_Validation extends Controller
{
    public function action_index()
    {
        $validator = Validation::forge();
        $validator->add("name", "User Name")
            ->add_rule("required")
            ->add_rule("min_length", 3)
            ->add_rule("max_length", 10);

        /**
         * Validation(POST method)
         *
         * OK pattern
         * curl http://...../public/validation -d "name=abc"
         *
         * NG pattern
         * curl http://...../public/validation
         * curl http://...../public/validation -d "name=ab"
         * curl http://...../public/validation -d "name=aaaaabbbbbc"
         */
        if (Input::method() === "POST") {
            if ($validator->run()) {
                $validated = $validator->validated();
                echo $validated["name"] . "<br>";
                echo "validation OK!";
                return;
            } 
            echo $validator->show_errors();
            echo "validation NG!";
            return;
        }

        /**
         * Validation(GET method)
         *
         * OK pattern
         * http://...../public/validation?name=abc
         *
         * NG pattern
         * http://...../public/validation?name= 
         * http://...../public/validation?name=ab 
         * http://...../public/validation?name=aaaaabbbbbc
         */
        if (Input::method() === "GET") {
            # Only POST method can be used at Validation by default. 
            # If you want to use GET method, 
            # use an array as an argument of run method, 
            # which contains parameters you want to validate. 
            if ($validator->run(array("name" => Input::get("name")))) {
                $validated = $validator->validated();
                echo $validated["name"] . "<br>";
                echo "validation OK!";
                return;
            } 
            echo $validator->show_errors();
            echo "validation NG!";
            return;
        }
    }    
}
