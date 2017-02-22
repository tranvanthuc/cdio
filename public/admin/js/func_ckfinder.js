function ckfinder(name) {
    var ckfinder = CKEDITOR.replace(name, {
        filebrowserBrowseUrl: baseUrl + '/admin/js/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: baseUrl + '/admin/js/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: baseUrl + '/admin/js/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl: baseUrl + '/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: baseUrl + '/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: baseUrl + '/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
}