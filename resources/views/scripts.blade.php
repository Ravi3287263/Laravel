<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    var index = `{{ route('blogs.index') }}`;
    function deleteRecord(blog_delete_url){
        var ajxReq = $.ajax( {
        url : blog_delete_url,
        data:{'_token': '{{ csrf_token() }}'},
        type : 'DELETE',
        success : function ( data ) {
        // $( "p" ).append( "Delete request is Success." );
            window.location.href= index;
        },
        error : function ( jqXhr, textStatus, errorMessage ) {
        // $( "p" ).append( "Delete request is Fail.");
        }
        });
        
    }
</script>
<script type = "text/javascript" >
function preventBack() { window.history.forward(); }
setTimeout("preventBack()", 0);
window.onunload = function () { null };
</script>