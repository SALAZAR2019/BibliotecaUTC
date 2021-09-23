function init()
{
    var	route= document.querySelector("[name=route]").value;
    var urlT= route + '/apiTipos';

    new Vue
    ({
        http:{
            headers:{
                'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
            }
        },

        el:"#tipo_us",

        data:{
            tipos:[],
            
        },

    });

}
window.onload = init;