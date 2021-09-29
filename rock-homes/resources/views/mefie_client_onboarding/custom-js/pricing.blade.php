<script >

  $(document).ready(function(){
        $('#home-feature').click(function(){
          $('li').removeClass("active");
          $(this).addClass("active");
      });
      
      $('#about-feature').click(function(){
          $('li').removeClass("active");
          $(this).addClass("active");
      });
      
      $('#pricing-feature').click(function(){
          $('li').removeClass("active");
          $(this).addClass("active");
      });
      
      $('#contact-feature').click(function(){
          $('li').removeClass("active");
          $(this).addClass("active");
      });
  
      $('#base-pr').click(function(){
          $('#stan-pr').removeClass("border starter-plan").find("h2").removeClass("text-primary");
          $('#prime-pr').removeClass("border starter-plan").find("h2").removeClass("text-primary");
          $(this).addClass("border border-0 rounded starter-plan ");
          $(this).find("h2").addClass("text-primary");
  
          $(this).find("a").removeAttr("hidden");
          $(this).find("a").show();
          $("#stan-pr").find("a").hide();
          $("#prime-pr").find("a").hide();
  
  
      });
  
      $('#prime-pr').click(function(){
          $('#stan-pr').removeClass("border starter-plan").find("h2").removeClass("text-primary");
          $('#base-pr').removeClass("border starter-plan").find("h2").removeClass("text-primary");
          $(this).addClass("border border-0 rounded starter-plan ");
          $(this).find("h2").addClass("text-primary");
  
          $(this).find("a").removeAttr("hidden");
          $(this).find("a").show();
          $("#stan-pr").find("a").hide();
          $("#base-pr").find("a").hide();
  
      });
  
      $('#stan-pr').click(function(){
          $('#base-pr').removeClass("border starter-plan").find("h2").removeClass("text-primary");
          $('#prime-pr').removeClass("border starter-plan").find("h2").removeClass("text-primary");
          $(this).addClass("border border-0 rounded starter-plan ");
          $(this).find("h2").addClass("text-primary");
  
          $(this).find("a").removeAttr("hidden");
          $(this).find("a").show();
          $('#base-pr').find("a").hide();
          $('#prime-pr').find("a").hide();
  
  
      });
      
  });
  
  </script>