<x-layout>

    <div class="container my-3 py-3"></div>

    <div class="container my-5 py-5 min-vh-100">
        
        <!-- Contact-->
        <section class="page-section shadow" id="contact">
           <div class="container">
               <div class="text-center">
                   <h2 class="section-heading text-uppercase my-3 py-3 text-first">Contatti</h2>
                   <h3 class="section-subheading text-first">Contattaci per diventare revisore di annunci</h3>
               </div>
           <form class="my-5 py-5" action="{{route('contact_save')}}" method="POST">
               @csrf
                   <div class="row align-items-stretch mb-5">
                       <div class="col-md-6">
                           <div class="form-group">
                               <input class="form-control" id="name" type="text" name="name" placeholder="Nome *" required="required" data-validation-required-message="Please enter your name." />
                               <p class="help-block text-danger"></p>
                           </div>
                           <div class="form-group">
                               <input class="form-control" id="email" type="email" name="email" placeholder="Email *" required="required" data-validation-required-message="Please enter your email address." />
                               <p class="help-block text-danger"></p>
                           </div>
                           <div class="form-group mb-md-0">
                               <input class="form-control" id="phone" type="tel" name="phone" placeholder="Telefono *" required="required" data-validation-required-message="Please enter your phone number." />
                               <p class="help-block text-danger"></p>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group form-group-textarea mb-md-0">
                               <textarea class="form-control" id="message" name="description" placeholder="Scrivi un messaggio *" required="required" data-validation-required-message="Please enter a message."></textarea>
                               <p class="help-block text-danger"></p>
                           </div>
                       </div>
                   </div>
                   <div class="text-center">
                       <div id="success"></div>
                       <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Invia</button>
                   </div>
               </form>
           </div>
       </section>
    </div>

</x-layout>