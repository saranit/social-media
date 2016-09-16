$(document).ready(function() {

	$('#cancel').on('click', function() {
		$('form').find('input').val('');
	});
 	
 	$('#login_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            /*valid: 'glyphicon glyphicon-ok',*/
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                	stringLength: {
                        min: 8,
                    },
                        notEmpty: {
                        message: 'Please enter your first name'
                    }
                }
            },
            userpassword: {
            	validators: {
            		stringLength: {
            			min: 8,
            		},
                    notEmpty: {
                        message: 'Please enter your password'
                    }
                }
            }
		}
	})
    .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#login_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
    });

	$('#changepassword_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            oldpassword: {
                validators: {
                	stringLength: {
                        min: 8,
						max: 15,
						message: 'The Password must be more than 5 and less than 15 characters long'
                    },
                        notEmpty: {
                        message: 'Please enter old password'
                    }
                }
            },
            newpassword: {
            	validators: {
            		stringLength: {
            			min: 8,
						max: 15,
						message: 'The Password must be more than 5 and less than 15 characters long'
            		},
                    notEmpty: {
                        message: 'Please enter new password'
                    }
				}
            },
            confirmpassword: {
            	validators: {
            		stringLength: {
            			min: 8,
						max: 15,
						message: 'The Password must be more than 5 and less than 15 characters long'
            		},
                    notEmpty: {
                        message: 'Please enter confirm password'
                    },
					identical: {
						field: 'newpassword',
						message: 'The password and its confirm are not the same'
					},
                }
            }
		}
	})
    .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#changepassword_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
    });

	$('#profileedit_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            agentname: {
                validators: {
                	stringLength: {
                        min: 8,
                    },
                        notEmpty: {
                        message: 'Please enter your name'
                    }
                }
            },
            agentaddress: {
            	validators: {
            		stringLength: {
            			min: 1,
            		},
                    notEmpty: {
                        message: 'Please enter your address'
                    }
                }
            },
            companyname: {
            	validators: {
            		notEmpty: {
                        message: 'Please enter your companyname'
                    }
                }
            },
			vatnumber: {
            	validators: {
            		notEmpty: {
                        message: 'Please enter vat number'
                    }
                }
            }
		}
	})
    .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
			$('#profileedit_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
    });

	$('#subagentform').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
		feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            subagentname: {
                validators: {
                	stringLength: {
                        min: 6,
                    },
					notEmpty: {
						message: 'Please enter your name'
                    }
                }
            },
            subagentemail: {
            	validators: {
            		emailAddress: {
            			message: 'The value is not a valid email address'
            		},
                    notEmpty: {
                        message: 'Please enter your email address'
                    },
					remote: {
						url:"http://localhost/hajj/hajj/agent/email_check",
						type:"post",
						data : function(validator) {
							return {
								subagentemail: validator.getFieldElements('subagentemail').val()
							};
						},
						message : "The email already exists, choose other one"
					}
                }
            },
            subagentusername : {
            	validators: {
					stringLength: {
                        min: 6,
                    },
            		notEmpty: {
                        message: 'Please enter your Username'
                    },
					remote: {
						/*url:"http://localhost/hajj/hajj/agent/username_check",
						type:"post",
						data : { subagentusername: $("#subagentusername").val() }, 
						function(response) {
							$('#loading').hide();
							$('#message').addClass('has-error');
							$('#message').html('').html(response.message).show().delay(4000).fadeOut();
						}*/

						url:"http://localhost/hajj/hajj/agent/username_check",
						type:"post",
						data : function(validator) {
							return {
								subagentusername: validator.getFieldElements('subagentusername').val()
							};
						},
						message : "The username already exists, choose other one"
						
					}
				}
            },
			subagentpassword: {
            	validators: {
            		notEmpty: {
                        message: 'Please enter vat number'
                    }
                }
            }
		}
	})
    .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
            $('#subagentform').data('bootstrapValidator').resetForm();
			// Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
    });

	/*$('#subagentusername').blur(function(){
		alert("subagentusername");
	});*/

	/*$('#loading').hide();
	
	$('#subagentusername').blur(function() {
        var agent_username = $("#subagentusername").val();
		// show loader
		$('#loading').show();
		$.post("http://localhost/hajj/hajj/agent/username_check", {
			subagentusername: agent_username
		}, function(response) {
			$('#loading').hide();
			$('#message').addClass('error');
			$('#message1').html('').html(response.message).show().delay(4000).fadeOut();
		});
		return false;
       
    });

	$('#subagentemail').blur(function() {
        var subagent_email = $("#subagentemail").val();
		// show loader
		$('#loading').show();
		$.post("http://localhost/hajj/hajj/agent/email_check", {
			subagentemail: subagent_email
		}, function(response) {
			$('#loading').hide();
			$('#message').addClass('error');
			$('#message').html('').html(response.message).show().delay(4000).fadeOut();
		});
		return false;
       
    });*/
    
	$('#delsubagentmsg').delay(4000).fadeOut();


});