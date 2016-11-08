<script>
    $(document).ready(function(){

        $('.tooltiped').tooltip();
        $('.modal-trigger').leanModal({dismissible: false});
        $('select').material_select();

        $('.modal-trigger.create').click(function(){
            $(this).parent('a').removeClass('collapsible-header');
            $('#modalCreate').openModal();

            $('button.crear').click(function (){
                var routeSave = 'http://localhost:8000/admins/save';
                var data    = $('#formCreate').serialize();
                var token   = $('#tokenC').attr('value');

                $.ajax({
                    url: routeSave,
                    type: 'POST',
                    headers: 	{ 'X-CSRF-TOKEN': token },
                    dataType: 	'json',
                    data:        data,
                    success: function(res) {
                        Materialize.toast(res.msn, 5000);
                        window.location.href = 'http://localhost:8000/dashboard';
                    },
                    fail: function (){
                        alert('No se completo el registro');
                    }
                });
            });
        });

        $('button.modal-close').click(function (){
            $('a.menu').addClass('collapsible-header');
            window.location.href = 'http://localhost:8000/dashboard';
        });

        $('ul#type input').each(function (){
            var id = $(this).attr('value');
            $(this).click(function (){
                if(id == 3) {
                    $('select#user_type').append($("<option value='TI'> Tarjeta de Identidad </option> <option value='RC'> Registro Civil </option>"));
                    $('select#user_type').material_select();
                    $('div.groups').show();
                    $('div.groupsTeacher').hide();
                }
                else if(id == 2){
                    $('div.groupsTeacher').show();
                    $('div.groups').hide();
                }
                else {
                    $('div.groups').hide();
                    $('div.groupsTeacher').hide();
                }
            })
        });

        $('#tipodeindentidad').hide();
        $('div#genre').hide();
        $('.modal-trigger.edit').click(function(){
            var id = $(this).parent('li').attr('data-id');
            var r  = " http://localhost:8000/admins/find/"+id+ " ";

            $.get(r, function(){
            }).done(function (res){
                $('#modalEdit').openModal();

                $(res.role).each(function (key) {
                    if(res.role[key].slug == 'administrator') {
                        $('h3#title').append("<i class='fa fa-diamond'></i>").css({"text-align": "center", "color": "#E5E4E2"});
                        $('span#username h5').append(" Administrador ").css({"text-transform": "capitalize"});
                        $('ul#typeUser').append('<li style="display:inline"><input name="editgroup1" type="radio" id="testad" value="2" /><label for="testad">Profesor</label></li><li style="display:inline; margin-left: 10px"><input name="editgroup1" type="radio" id="testade" value="3" /><label for="testade">Estudiante</label></li>');
                    }
                    else if(res.role[key].slug == 'teacher') {
                        $('h3#title').append("<i class='fa fa-graduation-cap'></i>").css({"text-align": "center", "color": "#E5E4E2"});
                        $('span#username h5').append(" Profesor ").css({"text-transform": "capitalize"});
                        $('ul#typeUser').append('<li style="display:inline"><input name="editgroup1" type="radio" id="testad" value="1" /><label for="testad">Administrador</label></li><li style="display:inline; margin-left: 10px"><input name="editgroup1" type="radio" id="testade" value="3" /><label for="testade">Estudiante</label></li>');
                    }
                    else {
                        $('h3#title').append("<i class='fa fa-child'></i>").css({"text-align": "center", "color": "#E5E4E2"});
                        $('span#username h5').append(" Estudiante ").css({"text-transform": "capitalize"});
                        $('ul#typeUser').append('<li style="display:inline"><input name="editgroup1" type="radio" id="testad" value="1" /><label for="testad">Administrador</label></li><li style="display:inline; margin-left: 10px"><input name="editgroup1" type="radio" id="testade" value="2" /><label for="testade">Profesor</label></li>');
                    }
                });

                $('.GroupMathEdit').hide();
                $('#GroupStudentRelation').hide();
                if(res.group && res.math){
                    $('.GroupMathEdit').show();
                    $(res.group).each(function (key){
                        $('#groupsRelation ').append("<span class='chip center'> "+res.group[key].group_name+" </span> ");
                    });
                    $(res.math).each(function (ind){
                        $('#mathsRelation ').append("<span class='chip center'> "+res.math[ind].math_name+" </span>");
                    })
                }else if(res.grupo){
                    $('#GroupStudentRelation').show();
                    $('#grupoEstudiante').append(res.grupo);
                }

                if(res.user.user_type == 'CC'){ $('#typeId').focus().val('Cedula de Ciudadanía'); }
                else if(res.user.user_type == 'PS'){$('#typeId').focus().val('Pasaporte');}
                else{$('#typeId').val('Registro Unico Tributario');}

                if(res.user.user_genre == 'M'){$('input#genreId').val('Masculino'); $('i#genreId').addClass('fa fa-mars');}
                else{$('input#genreId').val('Femenino'); $('i#genreId').addClass('fa fa-venus');}

                $('#identity').focus().val(res.user.user_identity);
                $('#name').focus().val(res.user.name);
                $('#lastname').focus().val(res.user.user_lastname);
                $('#email').focus().val(res.user.email);

                $('#birthday').focus().val(res.user.user_birthday);
                $('#age').focus().val(res.user.user_age);
                $('#address').focus().val(res.user.user_address);
                $('#phone').focus().val(res.user.user_phone);
                $('#blood').focus().val(res.user.user_blood);

                if(res.user.user_state == 'enabled'){ $('#active').attr('checked', true);}
                else{ $('#disabled').attr('checked', true); }

                $('#profession').focus().val(res.user.user_profession);
                $('#identity').focus().val(res.user.user_identity);
                $('button.update').attr('data-id', res.user.id);

            }).fail(function(){
                alert('No se envio nada');
            });
        });

        $('#UpdateGroupStudent').click(function (){
            $('.groupsTeacherClick').show();
        });


        $('div#GeneroHover').click(function (){
            $(this).hide();
            $('div#genre').show();
        });



        $('#tipodeidentidad').hide();
        $('div#typeI').click(function (){
            $(this).hide();
            $('#tipodeidentidad').show();
            $('#tipodeindentidad').material_select();
        });


        $('a.groupClick')
                .click(function (){
                    $('.groupsTeacher').show();
                })
                .dblclick(function (){
                    $('.groupsTeacher').hide();
                    alert( $('#formEdit').serialize() );
                });
        $('a.mathClick')
                .click(function (){
                    $('.groupsTeacher').show();
                })
                .dblclick(function (){
                    $('.groupsTeacher').hide();
                    alert( $('#formEdit').serialize() );
                });

        $('button.update').click(function(){
            var id      = $(this).attr('data-id');
            var route   = "http://localhost:8000/admins/find/"+id+"/update";
            var form    = $('#formEdit').serialize();
            var token   = $('#token').attr('value');

            alert(form);
            $.ajax({
                url: route,
                headers: 	{ 'X-CSRF-TOKEN': token },
                type: 		'PUT',
                dataType: 	'json',
                data:        form,
                success: function(res){
                    if(res.msn != null){
                        alert('Datos actualizados correctamente');
                        window.location.href = 'http://localhost:8000/dashboard';
                    }
                }
            })
        });

        $('.groupsTeacherClick').hide();
        $('div.changeUser')
                .mouseover(function(){
                    $(this).find('h3').css({"color": "black"});
                    $(this)
                            .click(function (){
                                $('.groupsChange').show();
                                $('ul#typeUser li input').each( function (){

                                    $(this).click(function () {
                                        var id = $(this).attr('value');
                                        //alert(id);

                                        if(id == 1){
                                            $('.GroupMathEdit').hide();
                                            $('.groupsTeacherClick').hide();
                                            $('.groupsTeacher').hide();
                                        }else if(id == 3) {
                                            $('.GroupMathEdit').hide();
                                            $('.groupsTeacherClick').show();
                                            $('.groupsTeacher').hide();
                                        }
                                        else {
                                            $('#GroupStudentRelation').hide();
                                            $('.groupsTeacher').show();
                                            $('.groupsTeacherClick').hide();
                                        }
                                    })
                                })
                            })
                            .dblclick(function (){
                                var i = $(this).find('i').attr('class');
                                var button = $(this).find('i');
                                //alert(i);

                                if(i == 'fa fa-child'){
                                    $('.GroupMathEdit').hide();
                                    $('#GroupStudentRelation').show();
                                    $('.groupsChange').hide();
                                    $('.groupsTeacher').hide();
                                }
                                else if(i == 'fa fa-graduation-cap'){
                                    $('.GroupMathEdit').show();
                                    $('.groupsChange').hide();
                                }
                                else if(i == 'fa fa-diamond') {
                                    $('.groupsChange').hide();
                                    $('.groupsTeacherClick').hide();
                                    $('.GroupMathEdit').hide();
                                }
                            });
                })
                .mouseout(function (){
                    $(this).find('h3').css({"color": "#E5E4E2"});
                });


        // Trae los grupos y las materias....
        $('div.groupsTeacher').hide();
        $.get('http://localhost:8000/extras', function (){
        }).done(function (res){
            $(res.msn).each(function (key){
                $('select#groups').append("<option value="+res.msn[key].id+"> "+res.msn[key].group_name+"</option>");
                $('select#groups').material_select();

                $('select#groupsMultiple').append("<option value="+res.msn[key].id+"> "+res.msn[key].group_name+"</option>");
                $('select#groupsMultiple').material_select();
            });
            $(res.math).each(function (key){
                $('select#mathMultiple').append("<option value="+res.math[key].id+"> "+res.math[key].math_code+" - "+res.math[key].math_name+"</option>");
                $('select#mathMultiple').material_select();
            });
        }).fail(function (){
            alert('Fallo la consulta de grupos');
        })

        $('.AsignGroupDirector').click(function (){
            var route = 'http://localhost:8000/groups/available';
            $.get(route, function (){

            }).success(function (res){
                if(res.groups.length > 0){
                    $(res.groups).each(function (key){
                        $('select#AsignGroupDirectorAvailable').append('<option value='+res.groups[key].id+'>'+res.groups[key].group_name+'</option>');
                        $('select#AsignGroupDirectorAvailable').material_select();

                        $('.SendGroupToDirector').click(function (){
                            var id = $('form#FormGroupDirector').attr('data-teacher');
                            var asign   = "http://localhost:8000/teacher/"+id+"/assign ";
                            var data    = $('#FormGroupDirector').serialize();
                            var token   = $('input#tokenGroupDirector').val();

                            $.ajax({
                                url: asign,
                                headers: {'X-CSRF-TOKEN': token },
                                dataType: 'json',
                                type: 'POST',
                                data: data,
                                success: function (res){
                                    Materialize.toast(res.msn, 10000);
                                    window.location.href = 'http://localhost:8000/dashboard';
                                },fail: function(res){
                                    alert('Que falla');
                                    window.location.href = 'http://localhost:8000/dashboard';
                                }
                            })
                        })
                    })
                } else {
                    $('#modalAsignGroup').closeModal();
                    alert('Ya no hay grupos disponibles para asignacion');
                    window.location.href = 'http://localhost:8000/dashboard';
                }
            }).fail(function (res){
                alert('Fallo la consulta');
                window.location.href = 'http://localhost:8000/dashboard';
            });

        });
    });
</script>