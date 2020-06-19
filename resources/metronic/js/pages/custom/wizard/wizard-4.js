"use strict";

// Class definition
var KTWizard4 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizard;
	var _validations = [];

	// Private functions
	var initWizard = function () {



		// Initialize form wizard
		_wizard = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

        $( "#skip_mobile_verification_el" ).click(function() {
            _wizard.goNext();
        });

		// Validation before going to next page
		_wizard.on('beforeNext', function (wizard) {

			_validations[wizard.getStep() - 1].validate().then(function (status) {
				if (status === 'Valid') {
					_wizard.goNext();
					KTUtil.scrollTop();
				} else {

					Swal.fire({
						text: "Sorry, looks like there are some errors detected, please try again.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});
            _wizard.next;
			_wizard.stop();  // Don't go to the next step
		});

		// Change event
		_wizard.on('change', function (wizard) {
			KTUtil.scrollTop();
		});


	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
                    pickup: {
						validators: {
							notEmpty: {
								message: 'Select Pickup location from the list'
							}
						}
					},
                    drop: {
                        validators: {
                            notEmpty: {
                                message: 'Select drop location from the list'
                            }
                        }
                    },

                    shiping_date: {
                        validators: {

                            notEmpty: {
                                message: 'Select shipping date '
                            }
                        }
                    },

				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()

				}
			}
		));

        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    category: {
                        validators: {

                            notEmpty: {
                                message: 'Select Category'
                            }
                        }
                    },
                    truck_type: {
                        validators: {

                            notEmpty: {
                                message: 'Select Truck Type'
                            }
                        }
                    },
                    weight: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter weight'
                            },
                            numeric: {

                                message: 'Only number is accepted',
                            }
                        }
                    },
                    goods_types: {
                        validators: {
                            notEmpty: {
                                message: 'Please select at least one good type'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()

                }
            }
        ));
		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
                    mobile: {
						validators: {

                            notEmpty: {
                                message: 'The mobile number is required.'
                            },
                            stringLength: {
                                min: 10,
                                message: 'The mobile number must have 10 digit.',
                            },
                            numeric: {
                                message: 'The value is not a mobile number',

                            }
						}
					},
                    code: {
                        validators: {
                            notEmpty: {
                                message: 'The code number is required for verification.'
                            },
                            stringLength: {
                                min: 4,
                                message: 'The  number must have 4 digit.',
                            },
                            numeric: {
                                message: 'The value is not a code number',

                            },
                            remote: {
                                url: 'api/match-otp',
                                method: 'POST',
                                // Send { username: 'its value', email: 'its value' } to the back-end
                                data: function() {
                                    return {
                                        mobile: _formEl.querySelector('[name="mobile"]').value,
                                        code: _formEl.querySelector('[name="code"]').value
                                    };
                                },
                                message: 'The code not matched'

                            }
                        }
                    }
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'Credit card name is required'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'email is required'
							},
                            emailAddress: {
                                message: 'The value is not a valid email address'
                            },
                            remote: {
                                url: 'api/email-exists',
                                method: 'POST',
                                // Send { username: 'its value', email: 'its value' } to the back-end
                                data: function() {
                                    return {
                                        email: _formEl.querySelector('[name="email"]').value,
                                        code: _formEl.querySelector('[name="code"]').value

                                    };
                                },
                                message: 'Email already register. use another email '

                            }
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard_v4');
			_formEl = KTUtil.getById('kt_form');

			initWizard();
			initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard4.init();
});
