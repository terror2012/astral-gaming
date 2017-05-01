/**
 * Created by Asus on 4/15/2017.
 */
function fill_game_name(url, csrf_token)
{
    $.ajax(
    {
    url: url,
    type: 'POST',
    data: {"game_id" : $('#game_id').val(), "_token": csrf_token},
    success: function(result){
        $('#game_name').val(result);
    }

    })
}