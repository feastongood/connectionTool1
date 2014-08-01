<?php 
include_once('../php/config.php'); 
$title = 'Signup - The Feast Connection Tool';
include_once('includes/header.php'); ?>

<!-- Main Content -->
<!-- Main jumbotron for a primary marketing message or call to action -->


<!-- <div class="modal fade bs-example-modal-sm in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="false" id="twitter_check">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="mySmallModalLabel">Quick question</h4>
      </div>
      <div class="modal-body">
        <p>Do you have a twitter account?</p>
        <div class="form-group">
          <label for="twitter_1">Twitter</label>
          <div class="input-group">
            <span class="input-group-addon">@</span>
            <input type="text" class="form-control" id="twitter_1" name="twitter_1" placeholder="feastongood" required>
          </div>
        </div>
        <p style="font-size: 11px;">We can autofill a few of these fields if you do.</p>
      </div>
      <div class="modal-footer" style="margin-top:0px">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" id="post_twitter" class="btn btn-primary">Yes</button>
      </div>
    </div><!-- /.modal-content 
  </div><!-- /.modal-dialog 
</div> -->

<div class="container-fluid">
 <form class="form-inline" role="form" action="php/post_signup.php" method="post">

   <div class="row">
     <div class="col-md-8">
       <h2>Hi there!</h2>
       <p>We're creating a digital space for social innovators and the people who support them to come together help each other do great work. It's called The Feast Connects, and the beta will launch around August 18th.</p>

       <p>To join our beta test, please fill out the Contributor Signup form. <br/>
        If you also have an organization or project you'd like to register, you'll be able to do that below.</p> 
      </div>
    </div>

    <div class="row" id="contributor">
      <div class="col-md-8">

        <h2>Contributor Signup</h2>
        <p>Thats right, you're more than just a <em>user</em>. Joining in the fun makes you a <em>Contributor</em>.<br/>
        <span style="font-size:10px">Bold fields are required.</span></p>

          <table><!--  id="basic_info"-->
            <tr>
              <td>
                <div class="form-group">
                  <label for="fname"><strong>First Name</strong></label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <label for="lname"><strong>Last Name</strong></label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
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
                <label for="city"><strong>City</strong></label>
                <input type="text" class="form-control" id="city" name="city" placeholder="New York" required>
              </div>
            </td>
          </tr>
          <tr>
            <td>
             <div class="form-group">
              <label for="job">Job Title</label>
              <input type="text" class="form-control" id="job" name="job" placeholder="Feaster">
            </div>
          </td>
          <td>
             <div class="form-group">
              <label for="company">Company</label>
              <input type="text" class="form-control" id="company" name="company" placeholder="Feaster">
            </div>
          </td>
        </tr>
      </table>

      <!-- drop downs -->
      <div class="ddcontainer">
        <div class="dd">
          <label for="passion">What are you passionate about? </label>
          <div class="ddwrapper">
            <div class="left">
              <select name="passion" class="form-control">
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
             </select>
           </div>
           <div class="and">and</div>
           <div class="right">
            <select name="passion2" class="form-control">
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
           </select>
         </div>
       </div>

     </div>

     <div class="dd">
      <label for="skill">What are you amazing at?</label>
      <div class="ddwrapper">
        <div class="left">
          <select name="skill" class="form-control">
            <option value=""></option>
            <option value="problem">Problem Solving</option>
            <option value="systems">Systems Thinking</option>
            <option value="data">Data / Analytics</option>
            <option value="engineering">Engineering</option>
            <option value="product">Product / Industrial Design</option>
            <option value="ux">UX / Interaction Design</option>
            <option value="administrative">Administrative Services</option>
            <option value="business">Business Consulting</option>
            <option value="coaching">Coaching + Training</option>
            <option value="environmental">Environmental / Sustainability Services</option>
            <option value="event">Event Management</option>
            <option value="facilitation">Facilitation</option>
            <option value="fundraising">Fundraising</option>
            <option value="graphic">Graphic Design</option>
            <option value="investment">Investment / Financial Services</option>
            <option value="legal">Legal Services</option>
            <option value="lobbying">Lobbying / Advocacy</option>
            <option value="marketing">Communications / Marketing</option>
            <option value="organizational">Organizational Development / Strategic Planning</option>
            <option value="photography">Photography / Videography / Multimedia</option>
            <option value="service">Service Design</option>
            <option value="project">Project Management</option>
            <option value="research">Research / Analysis</option>
            <option value="web2">Web 2.0 (wikis, podcasting, social media, etc.)</option>
            <option value="web">Web / Software Development / Programming</option>
            <option value="writing">Writing / Publishing / Editing</option>
            <option value="social">Social Sciences / Research</option>
            <option value="physical">Physical Sciences / Research</option>
            <option value="urban">Urban Planning / Design</option>
            <option value="music">Music</option>
            <option value="art">Art</option>
          </select>
        </div>
        <div class="and">and </div>
        <div class="right">
          <select name="skill2" class="form-control">
           <option value=""></option>
           <option value="problem">Problem Solving</option>
           <option value="systems">Systems Thinking</option>
           <option value="data">Data / Analytics</option>
           <option value="engineering">Engineering</option>
           <option value="product">Product / Industrial Design</option>
           <option value="ux">UX / Interaction Design</option>
           <option value="administrative">Administrative Services</option>
           <option value="business">Business Consulting</option>
           <option value="coaching">Coaching + Training</option>
           <option value="environmental">Environmental / Sustainability Services</option>
           <option value="event">Event Management</option>
           <option value="facilitation">Facilitation</option>
           <option value="fundraising">Fundraising</option>
           <option value="graphic">Graphic Design</option>
           <option value="investment">Investment / Financial Services</option>
           <option value="legal">Legal Services</option>
           <option value="lobbying">Lobbying / Advocacy</option>
           <option value="marketing">Communications / Marketing</option>
           <option value="organizational">Organizational Development / Strategic Planning</option>
           <option value="photography">Photography / Videography / Multimedia</option>
           <option value="service">Service Design</option>
           <option value="project">Project Management</option>
           <option value="research">Research / Analysis</option>
           <option value="web2">Web 2.0 (wikis, podcasting, social media, etc.)</option>
           <option value="web">Web / Software Development / Programming</option>
           <option value="writing">Writing / Publishing / Editing</option>
           <option value="social">Social Sciences / Research</option>
           <option value="physical">Physical Sciences / Research</option>
           <option value="urban">Urban Planning / Design</option>
           <option value="music">Music</option>
           <option value="art">Art</option>
         </select>
       </div>
     </div>
   </div>
 </div><!-- ddcontainer -->



 <table>
  <h4>Where can you be found?</h4>
  <p>Fill out the ones you'd like to share with others.</p>
  <tr>
   <td>
    <div class="form-group">
      <label for="url">URL</label>
      <div class="input-group">
        <span class="input-group-addon">http://</span>
        <input type="text" class="form-control" id="url" name="url" placeholder="feastongood.com">
      </div>
    </div>

  </td>

  <td>
    <div class="form-group">
      <label for="twitter">Twitter</label>
      <div class="input-group">
        <span class="input-group-addon">@</span>
        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="feastongood" required>
      </div>
    </div>

  </td>
  <tr>
    <td>
      <div class="form-group">
        <label for="facebook">Facebook</label>
        <div class="input-group">
          <span class="input-group-addon">facebook.com/</span>
          <input type="text" class="form-control" id="facebook" name="facebook" placeholder="feastongood">
        </div>
      </div>
    </td>
    <td>
      <div class="form-group">
        <label for="LinkedIn">LinkedIn</label>
        <div class="input-group">
          <span class="input-group-addon">linkedin.com/in/</span>
          <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="feastongood">
        </div>
      </div>
    </td>
  </tr>
  <tr>
    <td>
     <div class="form-group">
      <label for="instagram">Instagram</label>
      <div class="input-group">
        <span class="input-group-addon">instagram.com/</span>
        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="feastongood">
      </div>
    </div>
  </td>
  <td>
   <div class="form-group">
    <label for="youtube">Youtube</label>
    <div class="input-group">
      <span class="input-group-addon">youtube.com/</span>
      <input type="text" class="form-control" id="youtube" name="youtube" placeholder="feastongood">
    </div>
  </div>
</td>
</tr>
<tr>
  <td>
   <div class="form-group">
    <label for="vimeo">Vimeo</label>
    <div class="input-group">
      <span class="input-group-addon">vimeo.com/</span>
      <input type="text" class="form-control" id="vimeo" name="vimeo" placeholder="feastongood">
    </div>
  </div>
</td>
</tr>
<tr>
  <td colspan="2">
   <div class="form-group">
    <label for="extra">Anything else you'd like us to know?</label>
      <textarea name="extra"></textarea>
    </div>
</td>
</tr>
</table>

  <div id="haveOrg">
  <h4>Have an organization or project you'd like to register?</h4>
  <label class="radio-inline">
    <input type="radio" name="haveOrg" id="haveOrg1" value="Yes"> Yes
  </label>
  <label class="radio-inline">
    <input type="radio" name="haveOrg" id="haveOrg2" value="no" checked> No
  </label>
  </div>

</div>

<div class="col-md-4"> <!-- secondary contributor box -->

  <div class="secondary">
    <p>As a Contributor, you'll be able to:</p>
    <ul>
      <li>Find projects and organizations working in areas your passionate about.</li>
      <li>Sign up to receive regular email updates and asks from them.</li>
      <li>Share your knowledge and connections with those that need your help.</li> 
    </ul>
  </div>
</div>
</div>

<!-- Project registration -->
<div class="row" id="organization" style="display:none;">

    <div class="col-md-8">
      <h2>Organization signup</h2>
      <p>Projects, companies, and organizations making change! Sharing about the work you do is the soul of The Feast Connects.</p>
      
      <form>
        <table>
          <tr>
            <td>
              <div class="form-group">
                <label for="orgname"><strong>Organization Name</strong></label>
                <input type="text" class="form-control" id="orgname" name="orgname" placeholder="The Feast" required>
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
                <label for="city"><strong>Location</strong></label>
                <input type="text" class="form-control" id="city" name="city" placeholder="New York" required>
              </div>
            </td>
          </tr>
        </table>

              <!-- drop downs -->
      <div class="ddcontainer">
        <div class="dd">
          <label for="orgwork">What areas does your organization work in? </label>
          <div class="ddwrapper">
            <div class="left">
              <select name="orgwork" class="form-control">
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
             </select>
           </div>
           <div class="and">and</div>
           <div class="right">
            <select name="passion2" class="form-control">
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
           </select>
         </div>
       </div>

     </div>

     <div class="dd">
      <label for="orgskill">How does it solve problems?</label>
      <div class="ddwrapper">
        <div class="left">
          <select name="orgskill" class="form-control">
            <option value=""></option>
            <option value="problem">Problem Solving</option>
            <option value="systems">Systems Thinking</option>
            <option value="data">Data / Analytics</option>
            <option value="engineering">Engineering</option>
            <option value="product">Product / Industrial Design</option>
            <option value="ux">UX / Interaction Design</option>
            <option value="administrative">Administrative Services</option>
            <option value="business">Business Consulting</option>
            <option value="coaching">Coaching + Training</option>
            <option value="environmental">Environmental / Sustainability Services</option>
            <option value="event">Event Management</option>
            <option value="facilitation">Facilitation</option>
            <option value="fundraising">Fundraising</option>
            <option value="graphic">Graphic Design</option>
            <option value="investment">Investment / Financial Services</option>
            <option value="legal">Legal Services</option>
            <option value="lobbying">Lobbying / Advocacy</option>
            <option value="marketing">Communications / Marketing</option>
            <option value="organizational">Organizational Development / Strategic Planning</option>
            <option value="photography">Photography / Videography / Multimedia</option>
            <option value="service">Service Design</option>
            <option value="project">Project Management</option>
            <option value="research">Research / Analysis</option>
            <option value="web2">Web 2.0 (wikis, podcasting, social media, etc.)</option>
            <option value="web">Web / Software Development / Programming</option>
            <option value="writing">Writing / Publishing / Editing</option>
            <option value="social">Social Sciences / Research</option>
            <option value="physical">Physical Sciences / Research</option>
            <option value="urban">Urban Planning / Design</option>
            <option value="music">Music</option>
            <option value="art">Art</option>
          </select>
        </div>
        <div class="and">and </div>
        <div class="right">
          <select name="skill2" class="form-control">
           <option value=""></option>
           <option value="problem">Problem Solving</option>
           <option value="systems">Systems Thinking</option>
           <option value="data">Data / Analytics</option>
           <option value="engineering">Engineering</option>
           <option value="product">Product / Industrial Design</option>
           <option value="ux">UX / Interaction Design</option>
           <option value="administrative">Administrative Services</option>
           <option value="business">Business Consulting</option>
           <option value="coaching">Coaching + Training</option>
           <option value="environmental">Environmental / Sustainability Services</option>
           <option value="event">Event Management</option>
           <option value="facilitation">Facilitation</option>
           <option value="fundraising">Fundraising</option>
           <option value="graphic">Graphic Design</option>
           <option value="investment">Investment / Financial Services</option>
           <option value="legal">Legal Services</option>
           <option value="lobbying">Lobbying / Advocacy</option>
           <option value="marketing">Communications / Marketing</option>
           <option value="organizational">Organizational Development / Strategic Planning</option>
           <option value="photography">Photography / Videography / Multimedia</option>
           <option value="service">Service Design</option>
           <option value="project">Project Management</option>
           <option value="research">Research / Analysis</option>
           <option value="web2">Web 2.0 (wikis, podcasting, social media, etc.)</option>
           <option value="web">Web / Software Development / Programming</option>
           <option value="writing">Writing / Publishing / Editing</option>
           <option value="social">Social Sciences / Research</option>
           <option value="physical">Physical Sciences / Research</option>
           <option value="urban">Urban Planning / Design</option>
           <option value="music">Music</option>
           <option value="art">Art</option>
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
        <label for="url">URL</label>
        <div class="input-group">
          <span class="input-group-addon">http://</span>
          <input type="text" class="form-control" id="url" name="url" placeholder="feastongood.com">
        </div>
      </div>

    </td>

    <td>
      <div class="form-group">
        <label for="twitter">Twitter</label>
        <div class="input-group">
          <span class="input-group-addon">@</span>
          <input type="text" class="form-control" id="twitter" name="twitter" placeholder="feastongood" required>
        </div>
      </div>

    </td>
    <tr>
      <td>
        <div class="form-group">
          <label for="facebook">Facebook</label>
          <div class="input-group">
            <span class="input-group-addon">facebook.com/</span>
            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="feastongood">
          </div>
        </div>
      </td>
      <td>
        <div class="form-group">
          <label for="LinkedIn">LinkedIn</label>
          <div class="input-group">
            <span class="input-group-addon">linkedin.com/in/</span>
            <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="feastongood">
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td>
       <div class="form-group">
        <label for="instagram">Instagram</label>
        <div class="input-group">
          <span class="input-group-addon">instagram.com/</span>
          <input type="text" class="form-control" id="instagram" name="instagram" placeholder="feastongood">
        </div>
      </div>
    </td>
    <td>
     <div class="form-group">
      <label for="youtube">Youtube</label>
      <div class="input-group">
        <span class="input-group-addon">youtube.com/</span>
        <input type="text" class="form-control" id="youtube" name="youtube" placeholder="feastongood">
      </div>
    </div>
  </td>
</tr>
<tr>
  <td>
   <div class="form-group">
    <label for="vimeo">Vimeo</label>
    <div class="input-group">
      <span class="input-group-addon">vimeo.com/</span>
      <input type="text" class="form-control" id="vimeo" name="vimeo" placeholder="feastongood">
    </div>
  </div>
</td>
</tr>
<tr>
  <td colspan="2">
   <div class="form-group">
    <label for="extra">Anything else you'd like us to know?</label>
      <textarea name="extra"></textarea>
    </div>
  </div>
</td>
</tr>

</table>

</form>

</div><!-- end col-8 -->
<div class="col-md-4"> <!-- secondary contributor box -->

  <div class="secondary">
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
    <input type="text" style="display:none;" id="avatar" name="avatar" value=""> <!-- avatar url-->

    <input class="ml_submit" type="submit" onClick="mixpanel.track('Beta signup form submit');"/>
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
  <script>mixpanel.track("Beta signup page");</script>
</body>
</html>
