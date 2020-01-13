
<div class="contact-form-wrapper">
  <?php if($success): ?>
  <div class="contact__message success">
    <p>
      <?php echo $success; ?></p>
  </div>
  <?php else: ?>
  <?php if(isset($alert['error'])): ?>
  <div class="contact__message error">
    <p>
      <?php echo $alert['error']; ?></p>
  </div>
  <?php endif; ?>
  <form action="<?= $page->url() ?>#get-in-touch" method="post" class="contact-form">
    <div class="honeypot">
      <label for="website">Website<abbr title="required">*</abbr></label>
      <input id="website" type="website" name="website"/>
    </div>
    <div class="field first-name-field">
      <label for="name" class="contact-form-label required">First Name<abbr title="required">*</abbr></label>
      <input id="firstname" type="text" name="firstname" value="<?= $data['firstname'] ?? '' ?>" required="required" tabindex="1" class="form-input"/>
      <?php echo isset($alert['firstname']) ? '<span class="alert error">' . html($alert['firstname']) . '</span>' : ''; ?>
    </div>
    <div class="field last-name-field">
      <label for="lastname" class="contact-form-label required">Last Name<abbr title="required">*</abbr></label>
      <input id="lastname" type="text" name="lastname" value="<?= $data['lastname'] ?? '' ?>" required="required" tabindex="2" class="form-input"/>
      <?php echo isset($alert['lastname']) ? '<span class="alert error">' . html($alert['lastname']) . '</span>' : ''; ?>
    </div>
    <div class="field email-field">
      <label for="email" class="contact-form-label required">E-Mail<abbr title="required">*</abbr></label>
      <input id="email" type="email" name="email" value="<?= $data['email'] ?? '' ?>" required="required" tabindex="3" class="form-input"/>
      <?php echo isset($alert['email']) ? '<span class="alert error">' . html($alert['email']) . '</span>' : ''; ?>
    </div>
    <div class="line-break"></div>
    <div class="message-field">
      <div class="message-field-height field">
        <label for="message" class="message-field-label">Message<abbr title="required">*</abbr></label>
        <?php if(isset($data['message'])): ?>
        <textarea id="message" name="message" tabindex="3">
          <?php echo $data['message']; ?></textarea>
        <?php else: ?>
        <textarea id="message" name="message" tabindex="4"></textarea>
        <?php endif; ?>
        <?php echo isset($alert['message']) ? '<span class="alert error">' . html($alert['message']) . '</span>' : ''; ?>
      </div>
    </div>
    <div class="line-break"></div>
    <button type="submit" name="submit" value="Submit" tabindex="4" class="submit-button">Submit</button>
  </form>
  <div class="contact-form-note">*denotes required field</div>
  <?php endif; ?>
</div>