<a href="/" style=" display: block; margin-left: auto; margin-right: auto; width: 50%; text-align:center; margin-bottom:20px;"> 
   <img src="../../assets/images/logo-footer.png">
</a>
  <div style="margin: auto; height: fit-content; width: 800px; background: #F4F4F4; text-align: left; padding: 20px 40px; border-radius: 15px; box-sizing: 
   border-box; font-family: 'Poppins';">
    <p style="font-size:20px; line-height: 7px;"><strong>Dear, <span style="color: #38AF88 "> Tekenens <span></strong></p>
    <p> Below is the message sent by <span style="color: #38AF88 "> <?php echo e($data['name']); ?>  </span>. Please reply to the message below to <strong> <?php echo e($data['email']); ?> </strong> because the auto reply feature does not always work. 
    </p>
    <br>
    <p style="font-size: 17px; line-height: 10px; margin: 10px ​0 10px 0"><strong>From : </strong></p>
    <p style="margin: 0"><?php echo e($data['name']); ?> <?php echo e($data['email']); ?></p>
    <br>
    <p style="font-size: 17px; line-height: 15px; margin: 20px ​0 10px 0"><strong>Subject : </strong></p>
    <p style="margin: 0">Messages from guest</p>
    <br>
    <p style="font-size: 17px; line-height: 15px; margin:20px ​0 10px 0;"><strong>Messages : </strong></p>
    <p style="margin: 0; line-height: 20px"><?php echo e($data['text']); ?></p>
    <br>
    <hr>
    <p style="font-size:12px;">This email is sent via the contact form on the Tekenens Contact page (<a 
    href="https://tekenens.com/contact/">https://tekenens.com/contact/</a>)<p>
  </div><?php /**PATH G:\Diverso\wisnu\resources\views/emails/requestmeet.blade.php ENDPATH**/ ?>