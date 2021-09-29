const _end_point_url =   'https://ipapi.co/' + `/` + 'json';
        fetch(`${_end_point_url}`)
           .then( function(response) {
               if (response.status !== 200) {
                   console.log('Looks like there was a problem. Status Code: ' +
                       response.status);
                   return;
               }
               // Examine the text in the response
               response.json().then(function(data) {
                 
                 var input = document.querySelector("#phone");

                  if (input) {
                    
                      window.intlTelInput(input, {
                        // allowDropdown: false,
                        // autoHideDialCode: false,
                        // autoPlaceholder: "off",
                        // dropdownContainer: document.body,
                        // excludeCountries: ["us"],
                        // formatOnDisplay: false,
                        // geoIpLookup: function(callback) {
                        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                        //     var countryCode = (resp && resp.country) ? resp.country : "";
                        //     callback(countryCode);
                        //   });
                        // },
                        // hiddenInput: "full_number",
                        // initialCountry: "auto",
                        // localizedCountries: { 'de': 'Deutschland' },
                        // nationalMode: false,
                        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                        // placeholderNumberType: "MOBILE",
                        preferredCountries: [data.country_code.toLowerCase()],
                        // separateDialCode: true,
                        utilsScript: "../assets/plugins/intl-tel-input-master/utils.js",
                      });
                      
                  }
                    
                    return;
               })
           });   
 