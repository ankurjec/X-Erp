<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('asset/bootstrap.min.css') }}" />
    <!-- Style -->
   <!-- <link rel="stylesheet" href="css/style.css">-->
<link rel="stylesheet" href="{{asset('asset/css/style.css') }}" />
    <title>Create Invoice</title>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-12">
          <div class="form h-100">
            <h3>Get Started</h3>
            <form class="mb-5" id="contactForm" name="contactForm" action="{{ route('invoice.store') }}" method="POST">
           <!-- <form class="mb-5" method="post" id="contactForm" name="contactForm">-->
              <div class="row">
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Vendor Name *</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Vendor Email*</label>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Your email">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="budget" class="col-form-label">Budget</label>
                  <select class="custom-select" id="budget" name="budget">
    <option selected>Choose...</option>
    <option value="Rs.2,000 below">< Rs.1,000</option>
    <option value="Rs.3,000 - Rs.5,000">Rs.2,000 - Rs.5,000</option>
    <option value="Rs.5,000 - Rs.15,000">Rs.5,000 - Rs.15,000</option>
    <option value="Rs.15,000 - Rs.25,000">Rs.15,000 - Rs.25,000</option>
    <option value="Rs.25,000 >">Rs.25,000 ></option>
  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="message" class="col-form-label">Message *</label>
                  <textarea class="form-control" name="message" id="message" cols="30" rows="4"  placeholder="Write your message"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
              </div>
            </form>

            <div id="form-message-warning mt-4"></div> 
            <div id="form-message-success">
              Your message was sent, thank you!
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>