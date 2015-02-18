/**
 * Created by bwalleshauser on 2/16/2015.
 */
$j = jQuery.noConflict();
function move(originid,fromList,toList,all,type){
    if(!all)
    {
        all = false;
    }
    var movedArray = [];
    var remainingRegions = document.getElementById(fromList);
    for (var i = 0; i < remainingRegions.length; i++) {
        var opt = remainingRegions[i];
        if ((opt.selected && !opt.disabled) || (all && !opt.disabled)) {
            document.getElementById(fromList).removeChild(opt);
            document.getElementById(toList).appendChild(opt);
            i--;

            movedArray.push(opt.value);
        }
    }

    send(originid,type,movedArray);
}

function send(originid,type,movedArray)
{
    $j.ajax({
        type: "POST",
        url: $j('#post-url').data('url'),
        data: { type: type, regions: movedArray, originId: originid }
    })
        .success(function() {
            console.log('success');
        })
        .done(function() {
            console.log('done');
        })
        .fail(function() {
            console.log('fail');
        });
}