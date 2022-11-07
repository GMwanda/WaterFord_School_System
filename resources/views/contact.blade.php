<x-headerfooter-layout>
    <link rel="stylesheet" href="ProgramStyling/contact.css">

    <!--CONTACT-->
    <section class="contact">
        <div class="container contact_container">
            <aside class="contact_aside">
                <div class="aside_image">
                    <img src="/images/contacts.svg" alt="contact">
                </div>
                <h2>contact us</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Id, necessitatibus!
                </p>
                <ul class="contact_details">
                    <li>
                        <i class='bx bx-phone-call'></i>
                        <h5>+254896-586-582</h5>
                    </li>
                    <li>
                        <i class='bx bxl-gmail'></i>
                        <h5>mwanda@gmail.com</h5>
                    </li>
                    <li>
                        <i class='bx bxs-edit-location'></i>
                        <h5>Nairobi, Kenya</h5>
                    </li>
                </ul>
                <ul class="contact_socials">
                    <li>
                        <a href=""><i class='bx bxl-instagram-alt'></i></a>
                    </li>
                    <li>
                        <a href=""><i class='bx bxl-twitter'></i></a>
                    </li>
                    <li>
                        <a href=""><i class='bx bxl-facebook'></i></a>
                    </li>
                    <li>
                        <a href=""><i class='bx bxl-linkedin-square'></i></a>
                    </li>
                </ul>
            </aside>

            <form action="https://formspree.io/f/mknepybo" method="post"
                class="contact_form">
                <div class="form_name">
                    <input type="text" name="Firstname"
                        placeholder="FirstName" required>
                    <input type="text" name="Lastname" placeholder="Last
                        Name" required>
                </div>
                <input type="email" name="Emailaddress" placeholder="Email
                    Address" required>
                <textarea name="message" rows="7" required
                    placeholder="Message"></textarea>
                <button type="submit" class="btn btn_primary">Send Message</button>
            </form>
        </div>
    </section>

</x-headerfooter-layout>