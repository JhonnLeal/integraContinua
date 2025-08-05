$("#frmAcceso").on('submit',function(e){
	e.preventDefault();
    logina=$("#logina").val();
    clavea=$("#clavea").val();

    $.post("../controlador/crtLogin.php?op=verificar",
        {"logina":logina,"clavea":clavea},
        function(data){
        if (data!="null"){
            $(location).attr("href","../Vista/home/");            
        }
        else
        {
            alert("Usuario y/o Password son incorrectos");
        }
    });
})
