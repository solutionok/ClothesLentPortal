/* Default summernote editor */
if($(".summernote").length > 0){
    $(".summernote").summernote();
}
/* END Default summernote editor */

/* Extended summernote editor */
if($(".summernote_extended").length > 0){
    $(".summernote_extended").summernote({height: 250,
                                 codemirror: {
                                    mode: 'text/html',
                                    htmlMode: true,
                                    lineNumbers: true,
                                    theme: 'default'
                                  }
    });
}
/* END Extended summernote editor */

/* Lite summernote editor */
if($(".summernote_lite").length > 0){
    
    $(".summernote_lite").on("focus",function(){
        
        $(".summernote_lite").summernote({height: 100, focus: true,
                                          toolbar: [
                                              ["style", ["bold", "italic", "underline", "clear"]],
                                              ["insert",["link","picture","video"]]

                                          ]
                                         });
    });                
}
/* END Lite summernote editor */

/* Email summernote editor */
if($(".summernote_email").length > 0){
                                        
    $(".summernote_email").summernote({height: 400, focus: true,
                                      toolbar: [
                                          ['style', ['bold', 'italic', 'underline', 'clear']],
                                          ['font', ['strikethrough']],
                                          ['fontsize', ['fontsize']],
                                          ['color', ['color']],
                                          ['para', ['ul', 'ol', 'paragraph']],
                                          ['height', ['height']]
                                      ]
                                     });
    
}
/* END Email summernote editor */

/* Simple summernote editor */
if($(".summernote_simple").length > 0){
    
    $(".summernote_simple").summernote({height: 300, focus: true,
                              toolbar: [
                                  ["style", ["bold", "italic", "underline", "clear"]],
                                  ['font', ['strikethrough']],
                                  ['fontsize', ['fontsize']],
                                  ['color', ['color']],
                                  ['para', ['ul', 'ol', 'paragraph']],
                                  ['view', ['fullscreen', 'codeview']],
                                  ["insert",["link"]]
                              ]
                             });

}
/* END Simple summernote editor */

/*toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'italic', 'underline', 'clear']],
    ['fontname', ['fontname']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'hr']],
    ['view', ['fullscreen', 'codeview']],
    ['help', ['help']]
  ],*/