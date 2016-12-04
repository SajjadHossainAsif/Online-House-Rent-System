<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$config = array(
     'searchValidation' => array(
                array(
                        'field' => 'location',
                        'label' => 'Location',
                        'rules' => 'required',
                        
                    ),
                array(
                        'field' => 'sublocation',
                        'label' => 'Sublocation',
                        'rules' => 'required',
                        
                    ),
               
               
        ),
    //=================================owner  registration
    'ownerValidation' => array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required|is_unique[tbl_owner.username]',
                        
                	),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required|min_length[5]',
                        
                	),
                array(
                        'field' => 'matchPassword',
                        'label' => 'Confirm Password',
                        'rules' => 'required|matches[password]',
                        
                	),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'valid_email',
                        
                	),
                
                array(
                        'field' => 'mobile',
                        'label' => 'Mobile',
                        'rules' => 'required|numeric',
                        
                	),
               
        ),

    //====================================================Login validation
    'loginValidation' => array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required|is_unique[tbl_flat.flat_name]',
                        
                    ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required|min_length[5]',
                        
                    ),
               
        ),

    //====================================================add Flat validation
    'addFlatValidation' => array(
                array(
                        'field' => 'flatname',
                        'label' => 'Flat Name',
                        'rules' => 'required|is_unique[tbl_flat.flat_name]',
                        
                    ),
                array(
                        'field' => 'location',
                        'label' => 'Location',
                        'rules' => 'required',
                        
                    ),
                array(
                        'field' => 'sublocation',
                        'label' => 'Sub Location',
                        'rules' => 'required',
                        
                    ),
                array(
                        'field' => 'price',
                        'label' => 'Rent Price',
                        'rules' => 'required|numeric',
                        
                )
 
        ),

    //====================================================date validation
    'dateValidation' => array(
                array(
                        'field' => 'available_from',
                        'label' => 'Date',
                        'rules' => 'required',
                        
                    )
 
        )



);

