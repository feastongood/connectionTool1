<?php 
include_once('../php/config.php'); 
$title = 'Preview Signup - The Feast Connection Tool';
include_once('includes/header.php'); ?>


<div class="container-fluid">
 <form class="form-inline" role="form" id="project_form" action="php/post_project.php" method="post">

   <div class="row">
     <div class="col-md-10">
       <h2>The Feast Connects Organization Signup</h2>
       <p>The Feast Connects can help your project, company, or organization share it's work and mission with others. Connects can also help keep you in touch with thinkers & doers that can propel your work forward.</p>
      </div>
    </div>

   

<!-- Project registration -->
<div class="row" id="organization">

    <div class="col-md-8">
        <table>
          <tr>
            <td>
              <div class="form-group">
                <label for="name"><strong>Organization Name</strong></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="The Feast" required>
              </div>
            </td>
            <td>
              <div class="form-group">
                <label for="established"><strong>Year Established</strong></label>
                <input type="text" class="form-control" id="established" name="established" placeholder="2008" required>
              </div>
            </td>
          </tr>
          <tr>
           <td>
               <div class="form-group">
                <label for="email"><strong>Email address</strong></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="hello@feastongood.com" required>
              </div>
            </td>
            <td>
              <div class="form-group">
                <label for="p_city"><strong>Location</strong></label>
                <input type="text" class="form-control" id="p_city" name="p_city" placeholder="New York" required>
              </div>
            </td>
          </tr>
        </table>

              <!-- drop downs -->
      <div class="ddcontainer">
        <div class="dd">
          <label for="p_passion_1">What areas does your organization work in? </label>
          <div class="ddwrapper">
            <div class="left">
              <select name="p_passion_1" class="form-control">
               <option value=""></option>
               <option value="animal">Animal Rights</option>
               <option value="arts">Arts + Culture</option>
               <option value="children">Children + Youth</option>
               <option value="civic">Civic Society + Engagement </option>
               <option value="community">Community Development</option>
               <option value="diversity">Diversity</option>
               <option value="education">Education</option>
               <option value="employment">Employment</option>
               <option value="environment">Environment</option>
               <option value="equality">Equality + Human Rights</option>
               <option value="food">Food</option>
               <option value="health">Health + Well-Being</option>
               <option value="housing">Housing</option>
               <option value="international">International Development</option>
               <option value="poverty">Poverty</option>
               <option value="rural">Rural Issues</option>
               <option value="social">Social Justice</option>
               <option value="spirituality">Spirituality</option>
               <option value="sports">Sports + Recreation</option>
               <option value="urban">Urban Issues</option>
               <option value="transportation">Transportation</option>
               <option value="other">Other</option>
             </select>
           </div>
           <div class="and">and</div>
           <div class="right">
            <select name="p_passion_2" class="form-control">
             <option value=""></option>
             <option value="animal">Animal Rights</option>
             <option value="arts">Arts + Culture</option>
             <option value="children">Children + Youth</option>
             <option value="civic">Civic Society + Engagement </option>
             <option value="community">Community Development</option>
             <option value="diversity">Diversity</option>
             <option value="education">Education</option>
             <option value="employment">Employment</option>
             <option value="environment">Environment</option>
             <option value="equality">Equality + Human Rights</option>
             <option value="food">Food</option>
             <option value="health">Health + Well-Being</option>
             <option value="housing">Housing</option>
             <option value="international">International Development</option>
             <option value="poverty">Poverty</option>
             <option value="rural">Rural Issues</option>
             <option value="social">Social Justice</option>
             <option value="spirituality">Spirituality</option>
             <option value="sports">Sports + Recreation</option>
             <option value="urban">Urban Issues</option>
             <option value="transportation">Transportation</option>
             <option value="other">Other</option>
           </select>
         </div>
       </div>

     </div>

     <div class="dd">
      <label for="p_skill_1">How does it solve problems?</label>
      <div class="ddwrapper">
        <div class="left">
          <select name="p_skill_1" class="form-control">
            <option value=""></option>
            <option value="administrative">Administrative Services</option>
            <option value="art">Art</option>
            <option value="business">Business Consulting</option>
            <option value="coaching">Coaching + Training</option>
            <option value="marketing">Communications / Marketing</option>
            <option value="data">Data / Analytics</option>
            <option value="engineering">Engineering</option>
            <option value="environmental">Environmental / Sustainability Services</option>
            <option value="event">Event Management</option>
            <option value="facilitation">Facilitation</option>
            <option value="fundraising">Fundraising</option>
            <option value="graphic">Graphic Design</option>
            <option value="investment">Investment / Financial Services</option>
            <option value="legal">Legal Services</option>
            <option value="lobbying">Lobbying / Advocacy</option>
            <option value="music">Music</option>
            <option value="organizational">Organizational Development / Strategic Planning</option>
            <option value="photography">Photography / Videography / Multimedia</option>
            <option value="physical">Physical Sciences / Research</option>
            <option value="problem">Problem Solving</option>
            <option value="product">Product / Industrial Design</option>
            <option value="project">Project Management</option>
            <option value="research">Research / Analysis</option>
            <option value="service">Service Design</option>
            <option value="social">Social Sciences / Research</option>
            <option value="systems">Systems Thinking</option>
            <option value="urban">Urban Planning / Design</option>
            <option value="ux">UX / Interaction Design</option>
            <option value="web2">Web 2.0 (wikis, podcasting, social media, etc.)</option>
            <option value="web">Web / Software Development / Programming</option>
            <option value="writing">Writing / Publishing / Editing</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="and">and </div>
        <div class="right">
          <select name="p_skill_2" class="form-control">
           <option value=""></option>
            <option value="administrative">Administrative Services</option>
            <option value="art">Art</option>
            <option value="business">Business Consulting</option>
            <option value="coaching">Coaching + Training</option>
            <option value="marketing">Communications / Marketing</option>
            <option value="data">Data / Analytics</option>
            <option value="engineering">Engineering</option>
            <option value="environmental">Environmental / Sustainability Services</option>
            <option value="event">Event Management</option>
            <option value="facilitation">Facilitation</option>
            <option value="fundraising">Fundraising</option>
            <option value="graphic">Graphic Design</option>
            <option value="investment">Investment / Financial Services</option>
            <option value="legal">Legal Services</option>
            <option value="lobbying">Lobbying / Advocacy</option>
            <option value="music">Music</option>
            <option value="organizational">Organizational Development / Strategic Planning</option>
            <option value="photography">Photography / Videography / Multimedia</option>
            <option value="physical">Physical Sciences / Research</option>
            <option value="problem">Problem Solving</option>
            <option value="product">Product / Industrial Design</option>
            <option value="project">Project Management</option>
            <option value="research">Research / Analysis</option>
            <option value="service">Service Design</option>
            <option value="social">Social Sciences / Research</option>
            <option value="systems">Systems Thinking</option>
            <option value="urban">Urban Planning / Design</option>
            <option value="ux">UX / Interaction Design</option>
            <option value="web2">Web 2.0 (wikis, podcasting, social media, etc.)</option>
            <option value="web">Web / Software Development / Programming</option>
            <option value="writing">Writing / Publishing / Editing</option>
            <option value="other">Other</option>
         </select>
       </div>
     </div>
   </div>
 </div><!-- ddcontainer -->

          

   <h4>Where can your organization be found?</h4>
   <p>Fill out the ones that apply.</p>
   <table>
    <tr>
     <td>
      <div class="form-group">
        <label for="p_website">URL</label>
        <div class="input-group">
          <span class="input-group-addon">http://</span>
          <input type="text" class="form-control" id="p_website" name="p_website" placeholder="feastongood.com">
        </div>
      </div>

    </td>

    <td>
      <div class="form-group">
        <label for="p_twitter_id">Twitter</label>
        <div class="input-group">
          <span class="input-group-addon">@</span>
          <input type="text" class="form-control" id="p_twitter_id" name="p_twitter_id" placeholder="feastongood">
          <input type="text" style="display:none;" id="p_avatar" name="p_avatar" value=""> <!-- p_avatar url-->
        </div>
      </div>

    </td>
    <tr>
      <td>
        <div class="form-group">
          <label for="p_facebook_id">Facebook</label>
          <div class="input-group">
            <span class="input-group-addon">facebook.com/</span>
            <input type="text" class="form-control" id="p_facebook_id" name="p_facebook_id" placeholder="feastongood">
          </div>
        </div>
      </td>
      <td>
        <div class="form-group">
          <label for="p_linkedin_id">LinkedIn</label>
          <div class="input-group">
            <span class="input-group-addon">linkedin.com/in/</span>
            <input type="text" class="form-control" id="p_linkedin_id" name="p_linkedin_id" placeholder="feastongood">
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td>
       <div class="form-group">
        <label for="p_instagram_id">Instagram</label>
        <div class="input-group">
          <span class="input-group-addon">instagram.com/</span>
          <input type="text" class="form-control" id="p_instagram_id" name="p_instagram_id" placeholder="feastongood">
        </div>
      </div>
    </td>
    <td>
     <div class="form-group">
      <label for="p_youtube_id">Youtube</label>
      <div class="input-group">
        <span class="input-group-addon">youtube.com/</span>
        <input type="text" class="form-control" id="p_youtube_id" name="p_youtube_id" placeholder="feastongood">
      </div>
    </div>
  </td>
</tr>
<tr>
  <td>
   <div class="form-group">
    <label for="p_vimeo_id">Vimeo</label>
    <div class="input-group">
      <span class="input-group-addon">vimeo.com/</span>
      <input type="text" class="form-control" id="p_vimeo_id" name="p_vimeo_id" placeholder="feastongood">
    </div>
  </div>
</td>
</tr>
<tr>
  <td colspan="2">
   <div class="form-group">
    <label for="p_notes">Anything else you'd like us to know?</label>
      <textarea name="p_notes"></textarea>
    </div>
  </div>
</td>
</tr>

</table>





</div><!-- end col-8 -->
<div class="col-md-4"> <!-- secondary contributor box -->

  <div class="secondary" style="margin-top:0px;">
    <p>By adding your organization to The Feast Connects, you'll be able to:</p>
    <ul>
      <li>Share quick updates, via email, about your work with The Feast Connects community</li>
      <li>Receive advice and support in response</li>
      <li>Build a network of Contributors who are invested in your success</li> 
    </ul>
  </div>
</div>

</div>


<div class="row"><!-- hidden fields -->
  <div class="col-md-12">
    <!-- original submit <input class="ml_submit" type="submit" onClick="mixpanel.track('Beta signup form submit');"/> -->
   
    <input id="contribute_submit" type="submit" value="Submit" class="ml_submit">
    <p>ps. If you entered in your @twitter handle, we'll add your avatar to your Connects profile.</p>
  </div>

</div>
</div>


</form>
</div> <!-- /container -->
<!-- /Main Content -->



<?php include_once('includes/footer.php'); ?>

<script src="../js/jqBootstrapValidation.js"></script>


<script>
    // mixpanel.track( 'Visit form page');
    $(function(){
      $('#twitter_check').modal('show');
      $("input").not("[type=submit]").jqBootstrapValidation();
      var twitterData = [];
    });
  </script>
  <script src="js/json2.js"></script>
  <script>//mixpanel.track("Beta signup page");</script>
</body>
</html>
