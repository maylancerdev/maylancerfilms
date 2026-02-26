<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PageStatus;
use App\Models\Page;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class LegalPageSeeder extends Seeder
{
    public function run(): void
    {
        // Privacy Policy
        $privacy = Page::updateOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'title' => 'Privacy Policy',
                'body' => $this->privacyContent(),
                'excerpt' => 'Our policies regarding the collection, use and disclosure of Personal Information we receive from users of this site.',
                'status' => PageStatus::Published,
                'published_at' => now(),
                'show_in_header' => false,
                'show_in_footer' => true,
                'footer_position' => 'legal',
                'sort_order' => 90,
                'meta_title' => 'Privacy Policy — Maylancer Films',
                'meta_description' => 'Learn how Maylancer Films collects, uses and protects your personal information when you visit our website.',
            ],
        );

        // Terms & Conditions
        $terms = Page::updateOrCreate(
            ['slug' => 'terms-and-conditions'],
            [
                'title' => 'Terms & Conditions',
                'body' => $this->termsContent(),
                'excerpt' => 'The terms and conditions governing the use of this website and our services.',
                'status' => PageStatus::Published,
                'published_at' => now(),
                'show_in_header' => false,
                'show_in_footer' => true,
                'footer_position' => 'legal',
                'sort_order' => 91,
                'meta_title' => 'Terms & Conditions — Maylancer Films',
                'meta_description' => 'Read the terms and conditions for using the Maylancer Films website and services.',
            ],
        );

        // Career page
        Page::updateOrCreate(
            ['slug' => 'careers'],
            [
                'title' => 'Careers',
                'body' => $this->careerContent(),
                'excerpt' => 'Join our team of passionate filmmakers, storytellers, and creative professionals.',
                'status' => PageStatus::Published,
                'published_at' => now(),
                'show_in_header' => true,
                'show_in_footer' => true,
                'footer_position' => 'nav',
                'sort_order' => 5,
                'meta_title' => 'Careers — Maylancer Films',
                'meta_description' => 'Explore career opportunities at Maylancer Films. Join our team of passionate filmmakers and creative professionals.',
            ],
        );

        // Update site settings with actual page URLs
        SiteSetting::set('privacy_url', '/privacy-policy');
        SiteSetting::set('terms_url', '/terms-and-conditions');
    }

    private function privacyContent(): string
    {
        return <<<'MD'
## Privacy Policy

Maylancer Films ("us", "we", or "our") operates this website (the "Site"). This page informs you of our policies regarding the collection, use and disclosure of Personal Information we receive from users of the Site. We use your Personal Information only for providing and improving the Site. By using the Site, you agree to the collection and use of information in accordance with this policy.

### Information Collection And Use

While using our Site, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally identifiable information may include, but is not limited to your name ("Personal Information").

### Log Data

Like many site operators, we collect information that your browser sends whenever you visit our Site ("Log Data"). This Log Data may include information such as your computer's Internet Protocol ("IP") address, browser type, browser version, the pages of our Site that you visit, the time and date of your visit, the time spent on those pages and other statistics. In addition, we may use third party services such as Google Analytics that collect, monitor and analyze this data.

### Communications

We may use your Personal Information to contact you with newsletters, marketing or promotional materials and other information that we feel is relevant to your interests.

### Cookies

Cookies are files with small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a web site and stored on your computer's hard drive. Like many sites, we use "cookies" to collect information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Site.

### Security

The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage, is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.

### Changes To This Privacy Policy

This Privacy Policy is effective as of the date posted and will remain in effect except with respect to any changes in its provisions in the future, which will be in effect immediately after being posted on this page.

We reserve the right to update or change our Privacy Policy at any time and you should check this Privacy Policy periodically. Your continued use of the Service after we post any modifications to the Privacy Policy on this page will constitute your acknowledgment of the modifications and your consent to abide and be bound by the modified Privacy Policy. If we make any material changes to this Privacy Policy, we will notify you either through the email address you have provided us, or by placing a prominent notice on our website.

### Contact Us

If you have any questions about this Privacy Policy, please contact us at hello@maylancerfilms.com.
MD;
    }

    private function termsContent(): string
    {
        return <<<'MD'
## Terms & Conditions

The Terms and Conditions were last updated on February 26, 2026.

### 1. Introduction

These Terms and conditions apply to this website and to the transactions related to our products and services. You may be bound by additional contracts related to your relationship with us or any products or services that you receive from us. If any provisions of the additional contracts conflict with any provisions of these Terms, the provisions of these additional contracts will control and prevail.

### 2. Binding

By registering with, accessing, or otherwise using this website, you hereby agree to be bound by these Terms and conditions set forth below. The mere use of this website implies the knowledge and acceptance of these Terms and conditions. In some particular cases, we can also ask you to explicitly agree.

### 3. Electronic Communication

By using this website or communicating with us by electronic means, you agree and acknowledge that we may communicate with you electronically on our website or by sending an email to you, and you agree that all agreements, notices, disclosures, and other communications that we provide to you electronically satisfy any legal requirement, including but not limited to the requirement that such communications should be in writing.

### 4. Intellectual Property

We or our licensors own and control all of the copyright and other intellectual property rights in the website and the data, information, and other resources displayed by or accessible within the website.

**All the rights are reserved.** Unless specific content dictates otherwise, you are not granted a license or any other right under Copyright, Trademark, Patent, or other Intellectual Property Rights. This means that you will not use, copy, reproduce, perform, display, distribute, embed into any electronic medium, alter, reverse engineer, decompile, transfer, download, transmit, monetize, sell, market, or commercialize any resources on this website in any form, without our prior written permission, except and only insofar as otherwise stipulated in regulations of mandatory law (such as the right to quote).

### 5. Third-Party Property

Our website may include hyperlinks or other references to other party's websites. We do not monitor or review the content of other party's websites which are linked to from this website. Products or services offered by other websites shall be subject to the applicable Terms and Conditions of those third parties. Opinions expressed or material appearing on those websites are not necessarily shared or endorsed by us.

We will not be responsible for any privacy practices or content of these sites. You bear all risks associated with the use of these websites and any related third-party services. We will not accept any responsibility for any loss or damage in whatever manner, however caused, resulting from your disclosure to third parties of personal information.

### 6. Responsible Use

By visiting our website, you agree to use it only for the purposes intended and as permitted by these Terms, any additional contracts with us, and applicable laws, regulations, and generally accepted online practices and industry guidelines. You must not use our website or services to use, publish or distribute any material which consists of (or is linked to) malicious computer software; use data collected from our website for any direct marketing activity, or conduct any systematic or automated data collection activities on or in relation to our website.

Engaging in any activity that causes, or may cause, damage to the website or that interferes with the performance, availability, or accessibility of the website is strictly prohibited.

### 7. Idea Submission

Do not submit any ideas, inventions, works of authorship, or other information that can be considered your own intellectual property that you would like to present to us unless we have first signed an agreement regarding the intellectual property or a non-disclosure agreement. If you disclose it to us absent such written agreement, you grant to us a worldwide, irrevocable, non-exclusive, royalty-free license to use, reproduce, store, adapt, publish, translate and distribute your content in any existing or future media.

### 8. Termination of Use

We may, in our sole discretion, at any time modify or discontinue access to, temporarily or permanently, the website or any Service thereon. You agree that we will not be liable to you or any third party for any such modification, suspension or discontinuance of your access to, or use of, the website or any content that you may have shared on the website. You will not be entitled to any compensation or other payment, even if certain features, settings, and/or any Content you have contributed or have come to rely on, are permanently lost. You must not circumvent or bypass, or attempt to circumvent or bypass, any access restriction measures on our website.

### 9. Warranties and Liability

Nothing in this section will limit or exclude any warranty implied by law that it would be unlawful to limit or to exclude. This website and all content on the website are provided on an "as is" and "as available" basis and may include inaccuracies or typographical errors. We expressly disclaim all warranties of any kind, whether express or implied, as to the availability, accuracy, or completeness of the Content. We make no warranty that:

- this website or our content will meet your requirements;
- this website will be available on an uninterrupted, timely, secure, or error-free basis.

Nothing on this website constitutes or is meant to constitute, legal, financial or medical advice of any kind. If you require advice you should consult an appropriate professional.

In no event will we be liable for any direct or indirect damages (including any damages for loss of profits or revenue, loss or corruption of data, software or database, or loss of or harm to property or data) incurred by you or any third party, arising from your access to, or use of, our website.

### 10. Privacy

To access our website and/or services, you may be required to provide certain information about yourself as part of the registration process. You agree that any information you provide will always be accurate, correct, and up to date. We have developed a policy to address any privacy concerns you may have. For more information, please see our [Privacy Policy](/privacy-policy).

### 11. Accessibility

We are committed to making the content we provide accessible to individuals with disabilities. If you have a disability and are unable to access any portion of our website due to your disability, we ask you to give us a notice including a detailed description of the issue you encountered. If the issue is readily identifiable and resolvable in accordance with industry-standard information technology tools and techniques we will promptly resolve it.

### 12. Export Restrictions / Legal Compliance

Access to the website from territories or countries where the Content or purchase of the products or Services sold on the website is illegal is prohibited. You may not use this website in violation of export laws and regulations.

### 13. Assignment

You may not assign, transfer or sub-contract any of your rights and/or obligations under these Terms and conditions, in whole or in part, to any third party without our prior written consent. Any purported assignment in violation of this Section will be null and void.

### 14. Breaches of These Terms and Conditions

Without prejudice to our other rights under these Terms and Conditions, if you breach these Terms and Conditions in any way, we may take such action as we deem appropriate to deal with the breach, including temporarily or permanently suspending your access to the website, contacting your internet service provider to request that they block your access to the website, and/or commence legal action against you.

### 15. Force Majeure

Except for obligations to pay money hereunder, no delay, failure or omission by either party to carry out or observe any of its obligations hereunder will be deemed to be a breach of these Terms and conditions if and for as long as such delay, failure or omission arises from any cause beyond the reasonable control of that party.

### 16. Indemnification

You agree to indemnify, defend and hold us harmless, from and against any and all claims, liabilities, damages, losses and expenses, relating to your violation of these Terms and conditions, and applicable laws, including intellectual property rights and privacy rights. You will promptly reimburse us for our damages, losses, costs and expenses relating to or arising out of such claims.

### 17. Waiver

Failure to enforce any of the provisions set out in these Terms and Conditions and any Agreement, or failure to exercise any option to terminate, shall not be construed as waiver of such provisions and shall not affect the validity of these Terms and Conditions or of any Agreement or any part thereof, or the right thereafter to enforce each and every provision.

### 18. Entire Agreement

These Terms and Conditions, together with our privacy policy and cookie policy, constitute the entire agreement between you and Maylancer Films in relation to your use of this website.

### 19. Updating of These Terms and Conditions

We may update these Terms and Conditions from time to time. It is your obligation to periodically check these Terms and Conditions for changes or updates. The date provided at the beginning of these Terms and Conditions is the latest revision date. Changes to these Terms and Conditions will become effective upon such changes being posted to this website. Your continued use of this website following the posting of changes or updates will be considered notice of your acceptance to abide by and be bound by these Terms and Conditions.

### 20. Choice of Law and Jurisdiction

These Terms and Conditions shall be governed by applicable laws. Any disputes relating to these Terms and Conditions shall be subject to the jurisdiction of the appropriate courts. If any part or provision of these Terms and Conditions is found by a court or other authority to be invalid and/or unenforceable under applicable law, such part or provision will be modified, deleted and/or enforced to the maximum extent permissible so as to give effect to the intent of these Terms and Conditions. The other provisions will not be affected.

### 21. Contact Information

This website is owned and operated by Maylancer Films. You may contact us regarding these Terms and Conditions by emailing us at hello@maylancerfilms.com.
MD;
    }

    private function careerContent(): string
    {
        return <<<'MD'
## Join Our Team

At Maylancer Films, we believe great work comes from great people. We are always looking for passionate, talented individuals who share our commitment to cinematic excellence and creative storytelling.

### Why Maylancer Films?

- **Creative Freedom** — We encourage bold ideas and give our team the space to push creative boundaries on every project.
- **World-Class Projects** — Work on high-profile brand films, documentaries, commercials, and content for clients across the globe.
- **Growth & Development** — We invest in our people with mentorship, training, and opportunities to lead.
- **Collaborative Culture** — Join a tight-knit team where every voice matters and collaboration drives everything we do.

### Current Openings

We are always interested in hearing from exceptional talent. Even if you do not see a specific role listed below, we encourage you to reach out.

**Cinematographer**
Full-time / Freelance — Work with our production team to capture stunning visuals across commercial, documentary, and narrative projects.

**Video Editor / Post-Production Specialist**
Full-time — Transform raw footage into polished final cuts through expert editing, color grading, and sound design.

**Motion Graphics Designer**
Full-time / Freelance — Create compelling animated graphics, title sequences, and visual effects for film and digital content.

**Producer / Project Manager**
Full-time — Manage end-to-end production workflows, client relationships, timelines, and budgets.

**Content Strategist**
Full-time — Develop content strategies for brands, plan social media video campaigns, and align creative output with client goals.

### How to Apply

Send your resume, portfolio, and a brief cover letter to **hello@maylancerfilms.com** with the subject line "Career — [Position Title]". We review every application and will respond within two weeks.

We are an equal opportunity employer and value diversity in our team. All qualified applicants will receive consideration regardless of race, colour, religion, gender, sexual orientation, national origin, disability, or veteran status.
MD;
    }
}
