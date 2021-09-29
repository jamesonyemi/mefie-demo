@include('partials.master_header')
<!-- Begin page -->
<br><br><br>
<div id="layout-wrapper">
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
       <!-- Start Profile Area -->
       <section class="profile-area">
        <div class="mt-5"></div>
        <div class="row">
            <div class="col-lg-12 ">
                <div class="tab-content">
                    @include('users.profile.tab_fragments.tab_contents.settings_tab')
                </div>
        </div>
    </section>
    <!-- End Profile Area -->

    </div>
    <!-- END layout-wrapper -->
@include('users.import_users_modal')
@include('users.export_users_modal')
@include('partials.footer')

<script>
    
    
    ( () => {
        
        let gi   =   document.querySelectorAll("#fs");
        let lc   =   document.querySelector("#lock");
        let ulc  =   document.querySelector("#unlock");
        
        let stLock     =   document.querySelector(".st-lock");
        let stUnlock   =   document.querySelector(".st-unlock");
        let save_btn   =   document.querySelector("#save-changes");
        
        gi.forEach(el => {
            
            ulc.addEventListener("click", (e) => {
                el.removeAttribute("disabled");
                lc.removeAttribute("hidden");
                ulc.setAttribute("hidden", "hidden");
                save_btn.removeAttribute("hidden");
                // stLock
                    
                });
            
            lc.addEventListener("click", (e) => {
                el.setAttribute("disabled", "yes");
                lc.setAttribute("hidden", "hidden");
                ulc.removeAttribute("hidden");
                save_btn.setAttribute("hidden", "hidden")
                
            });
            
        });
        

    })();
    


</script>