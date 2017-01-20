<?php
/**
 * Template Name: Privacy Policy
 */
get_header(); ?>
<div class="page-content column-3">
    <?php get_sidebar('left'); ?>
    <div class="main-content">
        <h1 class="page-title" style="text-align:center;font-weight:bold;width:100%;margin-right:0;"><?php the_title(); ?></h1>
        <div class="post-content">
            <?php
            if ( have_posts() ) :
            	while ( have_posts() ) : the_post();
            ?>
            <div class="privacy-policy">
                <h5>SUMMARY</h5>
                <p>The following policy applies to TEACHERS-CAFE.COM , (referred to herein "T-CAFE" or "We"). We are committed to protecting the privacy and security of our online visitors. This Privacy Policy applies only to our online practices.</p>
                <h5>PERSONALLY IDENTIFIABLE INFORMATION</h5>
                <p>We consider the following, among other things, to be personally identifiable information: first and last name, e-mail address, street address and phone number. Information that we use internally to identify you as a user in our system, such as your selected User Name, is not considered personally identifiable information. We (and/or our agents or affiliates) may collect online and use personally identifiable information from our online visitors: (1) to process and fulfill transactions; (2) in connection with contests, sweepstakes, games, surveys, forums, subscription registrations, content submissions, classroom activities, message boards, blogs, our requests for suggestions and visitors' requests for information; (3) to customize the content of our site for our visitors' current and future needs; and (4) to provide service related announcements to you. We may even share such information between the buyers and sellers on our site in connection with transactions between such buyers and sellers. In addition, this personally identifiable information may be used to provide our visitors, via e-mail or other means, information about materials and activities that may be of interest to them, including products or services of third parties. For these reasons, we may share such information with third parties.</p>
                <h5>Information You Provide</h5>
                <p>During the registration process, we collect your e-mail address, address and birth date. This information helps to ensure we can properly pay Teacher-Authors and ensures that the feedback loop is accurate. During the Registration process, Teacher-Authors will also have the opportunity to provide a public Member Profile, which is like a biography about you and the Teaching Content that you wish to make available through TEACHERS-CAFE. You can choose to provide as much or as little information about yourself in your public Member Profile as you see fit. You should keep your real name hidden from the public users, sellers and buyers, and you only use the nickname that you choose as a username.</p>
                <h5>Access To Your Personal Information</h5>
                <p>You can view any personally identifiable information we have collected from you in your Member Profile Page, where you can add, edit, or remove information as you see fit. You can always access your Member Profile Page by logging in to your 'Manage My Account' pages at this link: http://www.TEACHERS-CAFE.COM and login as register user.</p>
                <h5>NON-PERSONALLY IDENTIFIABLE INFORMATION AND THE USE OF COOKIE TECHNOLOGY.</h5>
                <p>We collect non-personally identifiable information through the use of a software technology called "cookies," and through our visitors' voluntary submissions to us and/or upon our request. By non-personally identifiable information, we are referring to information about our visitors' browsers (e.g., Netscape Navigator or Internet Explorer), operating systems (e.g., Windows or Macintosh), Internet service providers (e.g., AOL or NET.COM) and other similar information which we track in aggregate form. The non-personally identifiable information that we track is anonymous and will never be identified with or lead us back to any of our visitors.</p>
                <p>Cookie technology helps us to know how many people visit us and where visitors go on our site. Cookies are small bits of information we send to your computer. Among other things, this non-personally identifiable information allows us to know which areas are favorites, which areas need a bit of improvement, or what technologies and Internet services are being used by our visitors so that we may continually improve our visitors' online experiences.</p>
                <h5>USE OF IP ADDRESSES</h5>
                <p>We collect IP addresses to obtain aggregate information on the use of TEACHERS-CAFE.COM . An IP address is a number assigned to your computer by a Web server when you're on the Web. When you are on our site, we have a back-end server that logs your computer's IP address. We only use the information we find out from tracking IP addresses in the aggregate, such as how many users entered a specific area of our site, and not to track a specific IP address to identify an individual user. However, we may use such information to identify a user if we feel that there are or may be safety and/or security issues or to comply with legal requirements.</p>
                <h5>THIRD-PARTY SERVERS</h5>
                <p>We may use third-party companies to serve ads when you visit our Web site and to monitor traffic to our Web site. These companies may (via cookies, gifs or otherwise) use aggregate information (not including your name, address, e-mail address, telephone number, or any other personally identifiable information) about your visits to this and other Web sites in order to provide us with data about our site and/or to provide advertisements about goods and services of interest to you. If you would like more information about this practice and to know your choices about not having this information used by these companies, click here.</p>
                <h5>SECURITY</h5>
                <p>We ensure that all personally and non-personally identifiable information that we receive via the Internet is secure against unauthorized access. This information is kept in a safe and secure system isolated from direct connection to the Internet. This means that no eyes but ours will ever see the information that our visitors send to us, unless we indicate otherwise, or it is in your Member Profile, or message board or blog area. We will give out personal information as required by law, for example to comply with a court order or subpoena or to assist in criminal investigations. We may also give out personal information when we deem it advisable in order to protect the safety and security of our sites and visitors to our sites.</p>
                <h5>Why Are We So Safe?</h5>
                <p>We use secure server software over a Secure Socket Layer (SSL) line to protect your credit card information. It encrypts all of your personal and credit card information so that this information cannot be read as it travels to our ordering system, and once it is received, it is stored in a location not accessible via the Internet.</p>
                <h5>LINKS TO OTHER SITES</h5>
                <p>Visitors will find links from TEACHERS-CAFE.COM  to independently-owned, controlled and/or managed World Wide Web or Internet sites whose content we have found of possible interest to our visitors. In many cases, but not always, the links represent cooperative projects or mutual links established with the organizations connected with these sites. While we initially visit these sites to which we directly link, please note that we do not monitor or control the content that appears on these sites and such content may be constantly changing. We encourage all end users of TEACHERS-CAFE.COM  to read the privacy policies of all linked sites before navigating through them.</p>
                <p>Please note that we may revise our above policy without notice to users as the content on our sites continues to change and we will post all such material changes on this Privacy Policy.</p>
                <p>We hope that you enjoy exploring and participating in our site.</p>
                <p>TEACHERS-CAFE.COM  is owned and operated by TEACHERS-CAFÉ AT ALSHARAFY COMPANY. You can reach us from our Contact Us page. If you have any questions about our privacy policy or practices, or you wish to amend, update, or verify the information on file, or to notify us that you want your information deleted from our files, please contact us at this address.</p>

            </div>
            <?php
            	endwhile;
            else :
            	//
            endif;
            ?>
        </div>
        <?php //echo premium_member(); ?>
    </div>
    <?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>