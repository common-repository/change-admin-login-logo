jQuery(document).ready(function() {
         // jQuery('#example').DataTable();

          // jQuery(document).on("click",".playlist-delete",function(){

          //   var conf = confirm("Are you sure want to delete this record");
          //   if(conf){
          //     var dataid = jQuery(this).attr("data-id");
          //     //console.log(dataid);
          //     var postdata = "action=boiler_ajax1&param=delete_playlist&id="+ dataid;
          //     jQuery.post(plugin_vars1.ajaxurl, postdata, function(response){

          //      //console.log(response);
          //      setTimeout(function(){
          //           location.reload();
          //      },1200);


          //     });
          //   }
          // });

          jQuery("#media-gallery").on("click",function(){
        

            var images = wp.media({
                title:"upload Image for Admin Icon",
                multiple:false                                 // if i make it false then u can upload only one image
            }).open().on("select", function(){
                var html ='';
                var uploaded_images = images.state().get("selection");
                var files = uploaded_images.toJSON();
                jQuery.each(files, function(index, item){
                    //console.log(item.url);
                    html += item.url ;
                });

                jQuery("#upload-img").val(html);
            });

          });

          jQuery("#frmAddPlaylist").validate({
            submitHandler:function(){
                var postdata = jQuery("#frmAddPlaylist").serialize()+"&action=boiler_ajax&param=add_playlist";
               jQuery.post(plugin_vars.ajaxurl, postdata, function(response){

                $('#msg').html(response).fadeIn('slow');
                
                $('#msg').delay(5000).fadeOut('slow');
                //console.log(response);


               });
            }

          });
      });