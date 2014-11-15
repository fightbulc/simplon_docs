(function ()
{
    $('.pin-button').click(function ()
    {
        $('#eva-matrix').toggleClass('pinned');
    });

    $('.subgroup .name').click(function ()
    {
        $(this).parent().toggleClass('expand');
    });

    $('.delete-btn').click(function (e)
    {
        bootbox.confirm("Are you sure want to delete this Application? This is permanent and can not be undone!", function (result)
        {
            if (result !== false)
            {
                var clientId = $(e.currentTarget).attr('id');
                window.location = '/remove.php?clientId=' + clientId;
            }
        });
    });
})();