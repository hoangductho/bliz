<?php
/*
| -----------------------------------------------------------------------
| Choose Account Type
| -----------------------------------------------------------------------
| System will be validate account follow account_type and account_define
|
| Default: Email
|
| Others: Username, Phone
|
| Extend: You can choose another type and define it in $custom['account_define']
*/
$custom['account_type'] = 'Email';
/*
|-----------------------------------------------------------------------
| Define Account Type
|-----------------------------------------------------------------------
| Define structure of the account types
|
| Format: $custom['account_define'][$ACCOUNT_TYPE] = options[$KEY => $VALUE];
|
| Options:
|   - prefix            string      string to start account
|   - suffix            string      string to stop account
|   - max_length        int         maximum length of account string
|   - min_length        int         minimum legnth of account string
|   - match             string      match string to validate using regular expression
|   - required          bool        allow null of not null
|   - filter_constant   mixed       PHP 5 Predefined Filter Constants
|   - input_constant    mixed       PHP 5 Predefined Input Constants
|   - max_range         int/float   maximum value of number. Only with filter_constants =  FILTER_VALIDATE_INT=257 | FILTER_VALIDATE_FLOAT=259
|   - min_range         int/float   minimum value of number. Only with filter_constants =  FILTER_VALIDATE_INT=257 | FILTER_VALIDATE_FLOAT=259
|
*/
$custom['account_define']['Email'] = array('filter_constants' => FILTER_VALIDATE_EMAIL, 'required' => TRUE);