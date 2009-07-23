/*************************************************************************************************************
* gadgets_io_makeRequest.js
* OpenSocial Gadgets IO MakeRequest Examples
*
* Created by Jonathan LeBlanc on 06/08/09.
* Copyright (c) 2009 Yahoo! Inc. All rights reserved.
*
* The copyrights embodied in the content of this file are licensed under the BSD (revised) open source license.
*************************************************************************************************************/

//run ajax request using OpenSocial gagets.io.makeRequest
function runXHR(){ 
    var url = "URL HERE";
    //define callback function
    var callback = xhrCallback;
    var params = {};
    //define content type of return value
    params[gadgets.io.RequestParameters.CONTENT_TYPE] = gadgets.io.ContentType.TEXT;
    //define method type (e.g. GET / POST)
    params[gadgets.io.RequestParameters.METHOD] = gadgets.io.MethodType.POST;
    //run ajax request
    gadgets.io.makeRequest(encodeURI(url), callback, params);
}

//ajax request callback
function xhrCallback(response){
    //check if data is returned from the request
    if (response.text){
        //do something
    }
}
