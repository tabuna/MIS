var arraydata = [];
function getmenus() {
    $("#spinsavemenu").show();

    var cont = 0;
    $("#menu-to-edit li").each(function(index) {
        var dept = 0;
        for (var i = 0; i < $("#menu-to-edit li").length; i++) {

            var n = $(this).attr("class").indexOf("menu-item-depth-" + i);
            if (n != -1) {
                dept = i;
            }
        }
		var parentid = '0';
		//Берём родителя
		if(dept != 0){
			//console.log($(this).prevAll('li.menu-item-depth-0').attr('id'));
			parentid = $(this).prevAll('li.menu-item-depth-0').attr('id');
		}

        var textoiner = $(this).find(".item-edit").context.id;



	  var id = this.id.split("-");
        var textoexplotado = textoiner.split("|");

		/*
        var padre = 0;

        if (!!textoexplotado[textoexplotado.length-2] && textoexplotado[textoexplotado.length-2]!= id[2]) {  
            padre = textoexplotado[textoexplotado.length-2]
        }*/


        arraydata.push({
            depth : dept,
            id : id[2],
            //parent : padre,
            sort : cont,
			parent : +parentid.replace(/\D+/g,"")
        });
        cont++;
    });
 actualizarmenu();
}

				function addcustommenu() {
					$("#spincustomu").show();

					$.ajax({
						data : {
							labelmenu : $("#custom-menu-item-name").val(),
							linkmenu : $("#custom-menu-item-url").val(),
							idmenu : $("#idmenu").val()
						},


						url : addcustommenur,
						type : 'POST',
                        beforeSend: function(request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
                        },
						success : function(response) {
							$("#success-changes").slideDown('slow');
							$("#spincustomu").hide();
							window.location = "";

						}
					});
				}

				function updateitem(id) {

					var label = $("#idlabelmenu_" + id).val();
					var clases = $("#clases_menu_" + id).val();
					var url = $("#url_menu_" + id).val();




					$.ajax({
						data : {
							label : label,
							clases : clases,
							url : url,
							id : id
						},

						url :updateitemr,
						type : 'POST',
                        beforeSend: function(request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
                        },
						success : function(response) {

							$("#menutitletemp_" + id).val(label);
							$("#success-changes").slideDown('slow');
							//console.log("aqu llega")
							//$("#spinsavemenu").hide();
						}
					});
				}

				function actualizarmenu() {



					$.ajax({
						dataType : "json",
						data : {
							arraydata : arraydata,
							menuname : $("#menu-name").val(),
							idmenu : $("#idmenu").val()
						},

						url : generatemenucontrolr,
						type : 'POST',
                        beforeSend: function(request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
                        },
						success : function(response) {

							$("#spinsavemenu").hide();
							$("#success-changes").slideDown('slow');
						}
					});
				}

				function deleteitem(id) {
					$.ajax({
						dataType : "json",
						data : {

							id : id
						},

						url :deleteitemmenur,
						type : 'POST',
                        beforeSend: function(request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
                        },
						success : function(response) {
							$("#success-changes").slideDown('slow');
						}
					});
				}

				function deletemenu() {

					var r = confirm("Вы действительно хотите удалить это меню?");
					if (r == true) {
						$.ajax({
							dataType : "json",

							data : {

								id : $("#idmenu").val()
							},

							url : deletemenugr,
							type : 'POST',
                            beforeSend: function(request) {
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
                            },
							success : function(response) {

								if (!!response.error) {
									alert(response.resp)
								}
								$("#success-changes").slideDown('slow');

							}
						});

					} else {
						return false;
					}

				}

				function createnewmenu() {

					if (!!$("#menu-name").val()) {
						$.ajax({
							dataType : "json",

							data : {
								menuname : $("#menu-name").val()
							},

							url :createnewmenur,
							type : 'POST',
                            beforeSend: function(request) {
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
                            },
							success : function(response) {

								$("#success-changes").slideDown('slow');
								window.location = menuwr+"?menu=" + response.resp

							}
						});
					} else {
						alert("Введите название меню!");
						$("#menu-name").focus();
						return false;
					}

				}
