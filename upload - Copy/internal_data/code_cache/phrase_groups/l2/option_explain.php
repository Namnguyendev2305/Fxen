<?php
return array (
  'option_explain.acpSearchExclude' => 'When using the quick search facility in the control panel, content from the following types will be searched. Disabling content types here may speed-up searching slightly.',
  'option_explain.activitySummaryEmail' => 'If enabled, users who have not visited for a while will receive an email to keep them updated about recent content. The content of the email can be configured <a href="admin.php?activity-summary/">here</a>.<br />
<br />
Note: Users can decide to opt-in/opt-out of receiving the activity summary email in their account preferences.',
  'option_explain.activitySummaryEmailBatchLimit' => 'The activity summary emails are sent daily by default and this value controls how many emails are sent  at a time.',
  'option_explain.addBanUserGroup' => 'When a user is banned, they can be added to a specific user group while the ban is active. This allows overrides to their user group styling, for example.',
  'option_explain.adminRequireTfa' => 'If enabled, admins will not be able to access the control panel until they have activated two-step verification. This will not affect users currently logged into the control panel until their next login.',
  'option_explain.adsDisallowedTemplates' => 'Bạn có thể muốn ngăn tất cả quảng cáo hiển thị trong các khuôn mẫu nhất định, chẳng hạn như lỗi hoặc các trang khác có thể chống lại ToS của nhà cung cấp quảng cáo. Liệt kê dưới đây.',
  'option_explain.akismetKey' => '<a href="https://akismet.com/signup/" target="_blank">Akismet</a> is a service that scans comments and determines if they are spam. If you enter an Akismet API key here, user messages will be checked for spam. You can sign up for an API key via their site. If Akismet determines a message is spam, it will have to be manually approved before being displayed.',
  'option_explain.alertExpiryDays' => 'User alerts will disappear from the alerts list this many days after being viewed. Unviewed alerts will automatically expire after 30 days.',
  'option_explain.alertsPerPage' => 'Controls how many alerts are shown on each page of users\' full alert list.',
  'option_explain.alertsPopupExpiryDays' => 'The alert popup will show all unviewed alerts, plus any viewed alerts that were viewed within the time frame (in days) before now. Note that the total amount shown in this popup is limited to no more than 25.',
  'option_explain.allowGuestRte' => 'If a text editor is shown to guests, this controls whether they will be given the option to use the formatting controls provided by the rich text editor. Disabling this can increase performance for guests if you allow guest posting or use the "write before registering" feature.',
  'option_explain.allowVideoUploads' => 'Use this option to globally enable or disable video/audio uploads. If enabled, you must give specific users/groups the relevant permissions to upload video/audio.<br />
<br />
The following additional extensions will be available for upload: {allowedVideoExtensions}.<br />
<br />
You should also provide the maximum video/audio file size in kilobytes (KB). Video/audio over this size will be rejected. The configuration of this server limits this value to <b>{serverMaxFileSize}</b> KB.',
  'option_explain.allowedCodeLanguages' => 'The languages defined here will be available to use inside code BB code with the format of [CODE=xxxx].',
  'option_explain.approveSharedBannedRejectedIp' => 'This option allows the IP address of a new registration to be checked against IPs recently used by banned or rejected users. If one or more matches is found, the registration will need to be manually approved by an administrator.',
  'option_explain.attachmentExtensions' => 'List the file extensions that are allowed to be uploaded. Use spaces or line break between extensions. If video/audio uploads are enabled, the related extensions will be automatically allowed.',
  'option_explain.attachmentMaxDimensions' => 'The maximum allowed dimensions for attached images (width x height). Use 0 or blank to not restrict dimensions.',
  'option_explain.attachmentMaxFileSize' => 'Provide the maximum attachment file size in kilobytes (KB). Attachments over this size will be rejected. The configuration of this server limits this value to <b>{serverMaxFileSize}</b> KB.',
  'option_explain.attachmentMaxPerMessage' => 'Use 0 to allow an unlimited number of attachments per message. To disable message attachments, use the permissions system.',
  'option_explain.attachmentThumbnailDimensions' => 'Controls the length of the shortest edge of attachment thumbnail images. The longer edge of the image may be longer than the length entered here. A value of at least 150px is recommended. Note that if this value is changed, you should rebuild attachment thumbnails via the "Rebuild caches" system.',
  'option_explain.autoEmbedMedia' => 'Bật tùy chọn này để hệ thống cố gắng tự động nhúng các phương tiện truyền thông từ URL được đăng bởi khách truy cập trỏ đến các trang truyền thông đã đăng ký. Nếu bạn chọn bao gồm một liên kết đến nội dung, việc nhúng các phương tiện truyền thông có thể được nhân đôi khi thông báo được trích dẫn.',
  'option_explain.boardActive' => '',
  'option_explain.boardDescription' => 'Enter a description for your board. This will be placed inside the meta description tag for the "Forums default page", so avoid using HTML.',
  'option_explain.boardInactiveMessage' => 'Khi quản trị viên đóng cửa diễn đàn, thông báo này sẽ được hiển thị cho khách truy cập trang web. Bạn có thể sử dụng HTML.',
  'option_explain.boardShortTitle' => 'The short title of your board. This should ideally be no more than 12 characters. This may be displayed when the full title is too long, such as when a user adds your app to their mobile home screen.',
  'option_explain.boardTitle' => 'Tiêu đề diễn đàn của bạn. Điều này sẽ được hiển thị ở đầu trang và được sử dụng trong email.',
  'option_explain.boardUrl' => 'URL chính cho diễn đàn của bạn không bao gồm dấu "/", chuỗi truy vấn, phân đoạn băm hoặc tên tệp như "index.php". URL được đề xuất là <b>{suggestedUrl}</b>',
  'option_explain.boardUrlCanonical' => 'Nếu được bật, cài đặt URL của bảng sẽ được coi là URL cài đặt chuẩn. Nếu khách truy cập truy cập vào trang web của bạn thông qua một URL khác, họ sẽ được chuyển hướng đến URL hợp quy thích hợp. Khi được bật, bạn phải đảm bảo rằng cài đặt URL của bảng là chính xác. Nếu không đúng, các khu vực bên ngoài bảng điều khiển quản trị sẽ không thể truy cập được!',
  'option_explain.bounceEmailAddress' => 'If an email cannot be delivered, the bounce notification will be returned to this email address. If left blank, bounced messages will be returned to the default email address. A value is required here if automated bounce handling is to be enabled. Note that this option may not work unless the return path parameter is enabled or mail is sent via SMTP using the Email Transport option.',
  'option_explain.captcha' => 'CAPTCHAs giúp ngăn spam đăng ký hoặc đăng bài.',
  'option_explain.categoryOwnPage' => 'When enabled, clicking on a link to a category will take you to a dedicated page that only shows the children of that category. When disabled, users will be redirected to the full forum list and scrolled to the correct category.',
  'option_explain.censorCharacter' => 'This character will be repeated for each character in a censored word that does not otherwise have a replacement specified. For example, if "dog" is censored, it may be replaced with "***".',
  'option_explain.censorWords' => 'This is a list of words or phrases that are to be censored.  If a replacement word or phrase is entered, the censored text will be rewritten to this (for example, replacing "dog" with "cat"). If no replacement is entered, the censored text will be replaced with censor characters (for example, "***").<br />
<br />
If you wish to match a wildcard at the beginning or end of the matched word, add a "*" in the correct position. For example, "dog" will not censor "dogs" but "dog*" will.',
  'option_explain.changeLogLength' => 'Content change log data will be kept for this many days. Use 0 to keep change log data indefinitely.',
  'option_explain.collectServerStats' => 'XenForo would like to collect some anonymous statistics including information about PHP, MySQL and your XenForo installation.<br />
<br />
If enabled, any data collected will be stored anonymously and will not include any user data.',
  'option_explain.contactEmailAddress' => 'Đây là địa chỉ email mà thành viên sẽ liên hệ với BQT',
  'option_explain.contactEmailSenderHeader' => 'Nếu được kích hoạt, các email gửi qua mẫu "Liên hệ với Chúng tôi" sẽ được gửi cùng với thông tin của người gửi trong tiêu đề "Từ" chứ không phải tiêu đề "Trả lời". Bật tính năng này có thể trợ giúp trong trường hợp trả lời tin nhắn liên lạc không đúng địa chỉ, nhưng nó có thể không tương thích với tất cả các máy chủ SMTP.',
  'option_explain.contactUrl' => 'Đây là URL đến trang mà thành viên có thể liên hệ với bạn. Xin lưu ý rằng tùy chọn lớp phủ sẽ chỉ hoạt động với URL XenForo, vì vậy nếu bạn chỉ định một URL bên ngoài, nó rất có thể sẽ không hoạt động với lớp phủ.',
  'option_explain.conversationPopupExpiryHours' => 'The conversations popup will show all conversations with unread replies, plus any read conversations whose most recent replies fall within the time frame (in hours) before now.',
  'option_explain.convertMarkdownToBbCode' => 'If enabled, some Markdown styling will automatically be converted to BB code when saved. Markdown is a simple method for adding formatting by using common patterns such as changing *example* into italics. This can make adding formatting to messages easier, but it can sometimes cause unexpected formatting changes.',
  'option_explain.cookieConsent' => 'When disabled, no cookie consent panel will be displayed.<br>
<br>
When simple is selected, guests will see a panel stating that cookies are used by this site and continued use consents to the cookies. This panel will continue to display until it is accepted.<br>
<br>
When advanced is selected, all visitors will see a panel providing the ability to give or withdraw consent to cookies on a group-by-group basis. This panel will continue to display until choices are saved. Visitors may re-open the panel at any time to modify their choices. Consent to certain cookie groups may be required in order for visitors to use certain functionality, including but not limited to registration, analytics, and media embeds.',
  'option_explain.cookieConsentLogLength' => 'The number of days that cookie consent log records will be kept for. Use 0 to keep the records permanently.',
  'option_explain.currentVersionId' => '',
  'option_explain.defaultEmailAddress' => 'Đây là địa chỉ email mặc định mà email sẽ được gửi đi.',
  'option_explain.defaultEmailStyleId' => '',
  'option_explain.defaultLanguageId' => '',
  'option_explain.defaultStyleId' => '',
  'option_explain.disallowedCustomTitles' => 'Enter the words or phrases that are disallowed in custom user titles. All censored words are automatically disallowed. Place each word or phrase on separate lines.',
  'option_explain.discourageBlankChance' => 'You may present discouraged users with a blank page from time to time. Enter the percentage chance of this happening.',
  'option_explain.discourageDelay' => 'Discouraged users will be subjected to a page loading delay of a random period between the two values provided here.',
  'option_explain.discourageFloodMultiplier' => 'The standard minimum time between messages can be multiplied to make discouraged users wait longer between posting. Enter a multiplier here.',
  'option_explain.discourageRedirectChance' => 'Enter the percentage chance that a discouraged user will be redirected to the redirection page.',
  'option_explain.discourageRedirectUrl' => 'You may randomly redirect discouraged users to a different page. Leave this blank to redirect to the forum home page.',
  'option_explain.discourageSearchChance' => 'When discouraged users attempt to search, this option defines the percentage chance that they will find it disabled. (0 = never, 100 = always)',
  'option_explain.discussionPreview' => 'If enabled a discussion/thread preview will appear when hovering over the title.',
  'option_explain.discussionRssContentLength' => 'The maximum number of characters of content to include in RSS feeds. Note that this includes any BB code mark up used in the message. 0 will disable content from being included in RSS feeds.',
  'option_explain.discussionsPerPage' => 'This controls the maximum number of discussions (such as threads) that will be shown on one page.',
  'option_explain.displayVisitorCount' => 'When a logged in user has unread conversations or unviewed alerts, the total count can be displayed in the user\'s browser tab before the title, or an indicator displayed on the favicon, or both.',
  'option_explain.dynamicAvatarEnable' => 'If enabled, an avatar will be dynamically created for users without a custom avatar. This will include a letter and a color based on their username. If disabled, all users without an avatar will receive a default placeholder.',
  'option_explain.editHistory' => 'If enabled, moderators will be able to see historical versions of messages and compare changes between them. Historical data will be pruned after the specified number of days. Use 0 to keep the history forever.',
  'option_explain.editLogDisplay' => 'If enabled, any edit after the delay will cause a "last edited" message to be displayed at the end of the message.',
  'option_explain.editorDropdownConfig' => 'This option can\'t be edited manually. It is edited only via the "BB code button manager" page.',
  'option_explain.editorToolbarConfig' => 'This option can\'t be edited manually. It is edited only via the "BB code button manager" page.',
  'option_explain.emailBounceHandler' => 'This option allows the "Bounced email address" account to be automatically read and processed for bounced email reports. This will detect if emails sent to a user bounce, forcing the user to update their email address and preventing the system from emailing them until this happens. This can help reduce the chance of email sent from your board from being considered spam.<br />
<br />
This option will read and remove emails from the specified account when processing. It MUST be directed to an account whose sole purpose is collecting bounce emails from this XenForo installation. A value must be entered for the "Bounced email address" option.',
  'option_explain.emailConversationIncludeMessage' => 'Khi bật tùy chọn này, các email thông báo được gửi tới người nhận cuộc trò chuyện sẽ chứa toàn văn thông báo về thông báo họ đang được thông báo. Khi tắt tùy chọn này, họ sẽ cần phải truy cập vào diễn đàn để đọc tin nhắn.',
  'option_explain.emailDkim' => 'DomainKeys Identified Mail (DKIM) is a method of email authentication to detect forged sender addresses which are often used in phishing and email spam. DKIM allows the receiver to verify that an email claimed to have originated from a particular domain was authorised by the owner of that domain.<br />
<br />
<strong>Note:</strong> You can only enable this option if you have the <a href="https://secure.php.net/manual/en/book.openssl.php" target="_blank"><code>openssl</code></a> extension installed and enabled.',
  'option_explain.emailFileCheckWarning' => 'If enabled, and no email address is provided, the warning emails will be sent to the <a href="admin.php?options/contactEmailAddress/view">contact email address</a>.',
  'option_explain.emailSenderName' => 'If specified, emails sent by XenForo will default to being from this name. If no value is entered, the board name will be used.',
  'option_explain.emailShare' => 'If a user clicks this button the user will be prompted to create a new email using their default email client.',
  'option_explain.emailSoftBounceThreshold' => 'If automated bounce processing is enabled, this criteria will be used to determine when multiple soft bounce failures will be considered permanent and emails will no longer be sent to the user.<br />
<br />
All threshold values are limited to bounces generated in the last 30 days.',
  'option_explain.emailTransport' => '',
  'option_explain.emailUnsubscribeHandler' => 'This option allows the "Unsubscribe email address" account to be automatically read and processed for unsubscribe email requests. Requests to this address will disable the "Receive news and update emails" option for users.<br />
<br />
This option will read and remove emails from the specified account when processing. It MUST be directed to an account whose sole purpose is collecting unsubscribe request emails from this XenForo installation. A value must be entered for the "Unsubscribe email address" option.',
  'option_explain.emailWatchedThreadIncludeMessage' => 'With this option enabled, notification emails sent to users watching threads/forums will contain the full text of the message about which they are being notified. With this option disabled, they will need to visit the forum to read the message.',
  'option_explain.emojiSource' => 'If you have chosen a value above other than "native" (which will always be served from the device, if available) then you may choose from which source to serve the emoji artwork from.<br />
<br />
By default, we will always serve the graphics from the preferred CDN, though if you wanted to download the artwork and host it yourself, or use a different CDN, you can specify the path here.',
  'option_explain.emojiStyle' => 'Emojis can look vastly different depending on which device you are using. Older devices may not support emoji at all. We can replace native device emoji (or missing emoji) with the artwork sets above.<br />
<br />
<b>Note:</b> Image emojis will only be displayed in areas which support rich text input.',
  'option_explain.enableMemberList' => 'If enabled, people will be able to browse an alphabetical list of users. This can have performance implications with a large number of users.',
  'option_explain.enableNewsFeed' => 'With this option disabled, viewing the news feed will be completely disabled.',
  'option_explain.enableNotices' => 'Nếu bạn không sử dụng hệ thống thông báo, bạn có thể hoàn toàn tắt nó và lưu một truy vấn vào quá trình tạo phiên làm việc.',
  'option_explain.enablePush' => 'If enabled, a user will be able to subscribe to receive their alerts via devices which are compatible with the Push API. Users will only be able to enable push notifications if they are using a compatible device. This is supported by most modern browsers.<br />
<br />
<strong>Note:</strong> You can only enable this option if you are using PHP 7.1 or above, with the <a href="https://secure.php.net/manual/en/book.gmp.php" target="_blank"><code>gmp</code></a>, <a href="https://secure.php.net/manual/en/book.mbstring.php" target="_blank"><code>mbstring</code></a> and <a href="https://secure.php.net/manual/en/book.openssl.php" target="_blank"><code>openssl</code></a> extensions enabled and have HTTPS enabled.',
  'option_explain.enableSearch' => 'With this option disabled, the search engine will not function.',
  'option_explain.enableTagging' => 'Tagging is a system that allows keywords to be applied to content to aid searching and content browsing.',
  'option_explain.enableTrophies' => 'Nếu được bật, thành viên của bạn có thể được thưởng <a href="admin.php?trophies/">danh hiệu</a> để hoàn thành các hành động nhất định hoặc đạt được các mốc quan trọng nhất định. Nếu bị vô hiệu hoá, <a href="admin.php?user-title-ladder/">Cấp bậc thành viên</a> sẽ không còn có thể sử dụng điểm danh hiệu nữa.',
  'option_explain.enableVerp' => 'If enabled, sent emails will include the recipient email address in the bounce/unsubscribe address field. This enables more accurate and more secure automated email handling. If using automated bounce/unsubscribe processing, enabling this option is strongly recommended.<br />
<br />
This option requires that the specified account is a catch-all account or supports a "+" as a wildcard separator (such as in Gmail). For example, if this option is enabled with a bounce address of bounce@example.com, the email might be returned to bounce+123abc+user=domain.com@example.com.',
  'option_explain.extraCaptchaKeys' => 'This option can\'t be edited manually. It is edited only via the "captcha" option.',
  'option_explain.facebookLike' => 'If this feature is enabled, a Facebook button will be displayed on various pages including the thread view page, allowing Facebook users to share it with their Facebook friends.',
  'option_explain.floodCheckLength' => 'Users will have to wait this many seconds between posting messages. Users with the permission "Can bypass flood check" will be exempt from this option.',
  'option_explain.floodCheckLengthDiscussion' => 'Users will have to wait this many seconds between posting new discussions (threads, conversations etc.). If this option is set to 0, the value for \'minimum time between messages\' will be used.',
  'option_explain.forumsDefaultPage' => 'Khi vào phần diễn đàn, đây sẽ là trang mặc định thành viên sẽ được đưa đến. Họ sẽ có thể truy cập vào trang thay thế thông qua các tùy chọn chuyển hướng phụ.',
  'option_explain.geoLocationUrl' => 'The URL specified here will be used to give information (such as a map) about a physical location. The URL must include a <strong>{location}</strong> token.',
  'option_explain.giphy' => 'If enabled, users will be able to search for GIFs while composing messages using the rich-text editor. Powered by <a href="https://giphy.com/" target="_blank">GIPHY</a>.',
  'option_explain.googleAnalyticsAnonymize' => 'If Google Analytics is enabled above and you wish to anonymize IP addresses, you can enable this option.',
  'option_explain.googleAnalyticsWebPropertyId' => 'You may enter your <a href="https://www.google.com/analytics/" target="_blank">Google Analytics</a> web property ID here to have the Analytics HTML automatically added to your public-facing pages.',
  'option_explain.gravatarEnable' => 'If enabled, your users may source their avatars from <a href="https://www.gravatar.com" target="_blank">Gravatar</a>. When a new user registers, XenForo will automatically search for a Gravatar associated with their email address. If disabled, this will not remove Gravatars from users that already have them.',
  'option_explain.guestShowSignatures' => 'In order to maximise your \'signal to noise\' ratio when displaying threads to guests, you may hide your members\' signatures.',
  'option_explain.guestTimeZone' => 'Tất cả ngày tháng và thời gian sẽ được hiển thị cho khách trong múi giờ này.',
  'option_explain.homePageUrl' => 'This is the URL to your home page, outside of the board. If this is left blank, \'Home\' will not appear in the navigation.',
  'option_explain.imageCacheRefresh' => 'Nếu nhập giá trị lớn hơn 0, hình ảnh được lưu trữ bởi proxy hình ảnh sẽ được làm mới sau nhiều ngày đã trôi qua. Điều này có thể được sử dụng kết hợp với tuổi thọ của bộ nhớ cache dài để cho phép hình ảnh được cập nhật theo định kỳ trong khi vẫn giữ được độ đàn hồi đối với hình ảnh bị xoá. Nếu nhập giá trị 0, hình ảnh sẽ chỉ được cập nhật khi mục nhập bộ nhớ cache hết hạn.',
  'option_explain.imageCacheTTL' => 'Enter the number of days that proxied images should be retained for, before they are removed from your system. If the image is re-requested after this time, it will automatically be fetched again. Use 0 to retain the images indefinitely.',
  'option_explain.imageLibrary' => 'XenForo can make use of various different image processing libraries to produce image thumbnails etc. Select your preferred library from the list above.',
  'option_explain.imageLinkProxy' => 'By enabling these options, you may proxy and cache images and links posted in messages through your own server, allowing tracking of clicks etc. Proxying of images is especially important if you are running your site through SSL (HTTPS).',
  'option_explain.imageLinkProxyKey' => 'If you have enabled the image or link proxy, this secret key will ensure that images and links are only proxied if the requests originated at your forum. If you find that links are being accessed via third-party sites, you can change this secret key to expire these links. All links stored on the forum will be automatically updated to use the new secret key.',
  'option_explain.imageLinkProxyLogLength' => 'Tùy chọn này kiểm soát khoảng thời gian mà nhật ký proxy sẽ được duy trì sau khi yêu cầu cuối cùng được thực hiện đối với một hình ảnh hoặc một liên kết. Nếu một mục nhập không được yêu cầu trong khoảng thời gian này, dữ liệu của nó (bao gồm cả thời gian yêu cầu đầu tiên và tổng số lượt truy cập) sẽ bị xóa. Nhật ký proxy hình ảnh sẽ không bao giờ bị xóa trừ khi dữ liệu hình ảnh đã bị xóa (Tuổi thọ bộ nhớ cache hình ảnh). Sử dụng 0 để vô hiệu hóa việc cắt tỉa các bản ghi.',
  'option_explain.imageLinkProxyReferrer' => 'If enabled, whenever a proxied image or link is accessed, referrer information will be maintained. This can be viewed in the logs to determine where the image or link has been mentioned. Use 0 to keep the referrer data forever.',
  'option_explain.imageProxyBypass' => 'By default, all images are proxied. Alternatively, you can choose to bypass it for all HTTPS requests or allow specific domains to bypass the image proxy.<br />
<br />
<b>Note:</b> Images not requested with HTTPS will always be proxied.',
  'option_explain.imageProxyMaxSize' => 'This is the maximum file size for images that are displayed through the image proxy system. An image larger than this will return a placeholder image instead. You may use 0 to disable the limit.',
  'option_explain.includeCaptchaPrivacyPolicy' => 'Some CAPTCHA providers may provide their own privacy policy that will be appended to the end of your site\'s privacy policy. You may wish to disable this if your privacy policy already covers the use of CAPTCHA.',
  'option_explain.includeTitleInUrls' => 'With this disabled, a URL such as /threads/my-thread.128/ would exclude the title and be output as /threads/128/',
  'option_explain.indexRoute' => 'If you wish to change the default index page of the forums, you may enter the route path here. The route path is the section of the URL to a page after your main forum directory URL, such as forums/ or pages/page-name/. Do not reference a route filter here.',
  'option_explain.ipInfoUrl' => 'Specify a URL to be used for requesting more information about an IP address. The URL must include <strong>{ip}</strong>, which will be replaced with the actual IP address.',
  'option_explain.ipLogCleanUp' => 'Old IP logs are rarely useful and simply take up space. They can be pruned after a specified amount of time if desired.',
  'option_explain.jQuerySource' => 'Controls the source of the jQuery core JavaScript library. You may host this yourself (Local) or use one of the recommended CDN sources. All CDN options support HTTPS/SSL.',
  'option_explain.jobRunTrigger' => 'Long-running and scheduled tasks are deferred to the job system. By default, activity on the forum triggers these jobs to run. This can be changed to trigger independently of forum activity but additional setup is required.<br />
<br />
<strong>Note:</strong> If you select "Server based trigger" you are required to configure your server (such as with <code>crontab</code> or <code>cron.d</code>) manually to execute the following command once per minute: <code>php /path/to/xf/cmd.php xf:run-jobs</code>',
  'option_explain.jsLastUpdate' => 'The Unix time stamp of the last JS update. This can be changed to force a JS recache even if the XF version doesn\'t change.<!-- <span class="js-updateJsLastUpdate">update</span>-->

<script>
/*$(function()
{
	$(\'.js-updateJsLastUpdate\').click(function()
	{
		var d = new Date();
		$(this).closest(\'dd\').find(\'input\').val(d.getTime() / 1000|0);
	});
});*/
</script>',
  'option_explain.lastPageLinks' => 'If a discussion spans multiple pages, the last few pages are displayed on the discussion list. Set the maximum number of pages to show here. Set the number to 0 to disable this feature.',
  'option_explain.lightBoxUniversal' => 'If enabled, the lightbox overlay will show images from all messages on the current page, rather than only the current message. Note that the lightbox will only include images that do not appear in full size in the message body.
',
  'option_explain.linkShare' => 'When clicked, the current page link will be copied to the clipboard.',
  'option_explain.loginLimit' => 'If a user fails to log in 4 or more times in a 15 minute period, this method will be used to prevent brute force attacks.',
  'option_explain.logoLink' => 'Nếu URL trang chủ được cung cấp, hãy chọn tùy chọn này để liên kết logo với URL đó. Nếu tùy chọn này không được chọn, logo sẽ luôn liên kết với Index page route.',
  'option_explain.lostPasswordCaptcha' => 'Để ngăn các robot làm hỏng biểu mẫu mật khẩu bị mất của bạn, bạn có thể thêm bảo vệ CAPTCHA vào nó.',
  'option_explain.lostPasswordTimeLimit' => 'To prevent flooding, you may require a delay between lost password requests. Enter a length of time in seconds that users must wait.',
  'option_explain.maxContentSpamMessages' => 'Users will only have their messages checked as spam until they have successfully posted this many messages. Use 0 to disable all spam checks.',
  'option_explain.maxContentTags' => 'This controls the maximum number of tags that can be applied to a piece of content. Use 0 to disable this limit.',
  'option_explain.maxContentTagsPerUser' => 'Beyond controlling the maximum number of tags on a piece of content, you can limit the number of tags each user may apply to prevent a single user from abusing the system. Use 0 to disable this limit.',
  'option_explain.maximumSearchResults' => 'This number reflects the maximum number of search or find new results that will be found, before permissions are taken into account. Setting this too high may cause performance problems.',
  'option_explain.membersPerPage' => 'Limit the number of members to show on each page of the registered member list, and online members list.',
  'option_explain.messageMaxImages' => 'Use 0 to allow an unlimited amount of images per message.',
  'option_explain.messageMaxLength' => 'The maximum number of characters that can be in a message. This includes BB code. Setting this value too large or disabling it entirely may cause performance issues and is not recommended.',
  'option_explain.messageMaxMedia' => 'Use 0 to disable this limit. Disabling the limit or setting it too high is not recommended, as numerous media embeds can cause browser performance problems.',
  'option_explain.messagesPerPage' => 'When there are more messages to display than this number, they will be separated into page 2, page 3 etc.',
  'option_explain.moderatorLogLength' => 'The number of days that moderator log records will be kept for. Use 0 to keep the records permanently.',
  'option_explain.multiQuote' => 'Enabling this system allows multiple messages across multiple pages to be selected and quoted in a single reply.',
  'option_explain.newsFeedMaxItems' => 'Số mục tin nguồn cấp dữ liệu tối đa để tìm nạp khi người dùng xem nguồn cấp dữ liệu tin tức của họ. Cũng kiểm soát bao nhiêu sẽ được lưu trữ. Số lượng lớn đòi hỏi nhiều tài nguyên hơn cả về thời gian lưu trữ và xử lý.',
  'option_explain.newsFeedMessageSnippetLength' => 'When the text of messages is displayed in news feed items, it will be trimmed to the length specified here.',
  'option_explain.oEmbedCacheRefresh' => 'If a value greater than 0 is entered, oEmbed data cached by the system will be refreshed after this many days have passed. If a value of 0 is entered, oEmbed data will only be updated when the cache entry expires.',
  'option_explain.oEmbedCacheTTL' => 'Enter the number of days for which fetched oEmbed data should be retained, before they are removed from your system. If the oEmbed data is re-requested after this time, it will automatically be fetched again. Use 0 to retain oEmbed data indefinitely.',
  'option_explain.oEmbedLogLength' => 'Controls how long oEmbed logs are retained after the most recent request for the referenced oEmbed data. Logs are only removed if the oEmbed data has expired and been pruned. Set this to 0 to disable log pruning.',
  'option_explain.oEmbedRequestReferrer' => 'If enabled, whenever oEmbed data is accessed, referrer information will be maintained. This can be viewed in the logs to determine where the embedded media has been mentioned. Use 0 to keep the referrer data forever.',
  'option_explain.onlineStatusTimeout' => 'After a user interacts with the system (by clicking a link etc.) they will be considered \'online\'. They will be considered to be offline if they do not interact with the system again within the time specified here.',
  'option_explain.pinterestShare' => 'This button will let your users pin your content to any Pinterest board.',
  'option_explain.pollMaximumResponses' => 'This will limit the number of choices that can be given as responses to a poll.',
  'option_explain.preRegAction' => 'If enabled, guests will be able to write supported content but asked to register before it is submitted and publicly viewable. In most circumstances, the permissions should be inherited from the group or groups that a newly registered user would be placed into. By default, this is the "Registered" group.',
  'option_explain.preventDiscouragedRegistration' => 'You may prevent any visitors browsing from <a href="{link}">discouraged IP addresses</a> from registering new accounts. They will be informed that registration is currently disabled.',
  'option_explain.privacyPolicyForceWhitelist' => 'If you decide to <a href="admin.php?force-agreement/privacy-policy" target="_blank">Force privacy policy agreement</a> then the routes listed here will bypass being redirected to the force agreement page. The route path is the section of the URL to a page after your main forum directory URL, such as forums/ or pages/page-name/. Do not reference a route filter here.',
  'option_explain.privacyPolicyLastUpdate' => 'The Unix time stamp of the last privacy policy update.',
  'option_explain.privacyPolicyUrl' => 'Nếu được nhập, một liên kết chính sách bảo mật sẽ được đưa vào footer.',
  'option_explain.profilePostMaxLength' => 'The maximum number of characters that can be in a profile post or comment. Setting this value too large or disabling it entirely may cause performance issues and is not recommended.',
  'option_explain.pushKeysVAPID' => 'This option can\'t be edited manually. It is edited only via the "enablePush" option.',
  'option_explain.readMarkingDataLifetime' => 'This is the number of days to maintain read marking data (such as for threads and forums). Data older than this will always be seen as read.',
  'option_explain.redditShare' => 'The Reddit share button allows your users to share your content quickly and easily directly to Reddit.',
  'option_explain.registrationCheckDnsBl' => 'Check IP addresses in DNS block lists when a new user registers to help prevent spam. If the StopForumSpam integration is not enabled, the Tornevall DNSBL will be checked.',
  'option_explain.registrationDefaults' => 'In order to keep the registration form short, many preferences are not shown. This option allows you to set the default values for newly registered users.',
  'option_explain.registrationSetup' => 'These basic options set the foundation for new registrations to your forum.',
  'option_explain.registrationTimer' => 'Use this option to set a minimum number of seconds that a registration must take before being submitted. This can help prevent spam registrations. Use 0 to disable this option.',
  'option_explain.registrationWelcome' => '',
  'option_explain.reportIntoForumId' => 'If a forum is selected here, the report center will be disabled and a thread will be posted whenever content is reported.',
  'option_explain.romanizeUrls' => 'Nếu được chọn, các ký tự không phải chữ Latin trong URL sẽ được chuyển đổi sang các ký tự Latin nếu có thể.',
  'option_explain.rootBreadcrumb' => 'Specify the navigation item that will serve as the \'root\' of your breadcrumb list.',
  'option_explain.saveDrafts' => 'If enabled, drafts will be periodically sent to the server and stored to allow users to resume working on their messages later. Disabling this will also disable the automatic checking for new messages when composing a reply.',
  'option_explain.searchMinWordLength' => 'This is the minimum length of a word that can be searched by the index. With the default search system, this should correspond with the MySQL full text minimum word length (normally 4).',
  'option_explain.searchResultsPerPage' => '',
  'option_explain.selectQuotable' => 'This feature enables users to quote snippets of messages by using their browser\'s text-selection tools.',
  'option_explain.sharedIpsCheckLimit' => 'When checking for other users having used the same IP addresses, this control limits the search to the last X days.',
  'option_explain.shortcodeToEmoji' => 'If enabled, common <code>:short_code:</code> will be converted to emoji and, where supported, we will display suggestions as you type. If an emoji and smilie share the same short code, the smilie will be used.',
  'option_explain.showEmojiInSmilieMenu' => 'If enabled, the smilie menu will display a categorised list of all emoji in addition to your custom smilies.',
  'option_explain.showMessageOnlineStatus' => 'If enabled, messages will display an icon if the author is currently online.',
  'option_explain.sitemapAutoRebuild' => 'If this option is enabled, the sitemap will be rebuilt automatically periodically. If this option is disabled, the sitemap will only be updated when it is rebuilt manually through <i>Tools &gt; Rebuild caches</i>. The current sitemap can be accessed via <a href="sitemap.php">sitemap.php</a>.',
  'option_explain.sitemapAutoSubmit' => 'Once a sitemap is built, if this option is enabled, the updated version will be automatically submitted to the search engines specified. {$url} is replaced with your sitemap URL automatically. If this option is not enabled, search engines will only know about the sitemap if it is listed in robots.txt or if you manually submit it to them.',
  'option_explain.sitemapExclude' => 'Nếu bạn muốn loại trừ một số loại nội dung khỏi sơ đồ trang web, bạn có thể thực hiện ở đây. Lưu ý rằng nội dung phải được khách truy cập để đưa vào sơ đồ trang web, bất kể thiết lập này là gì.',
  'option_explain.sitemapExtraUrls' => 'If desired, you may include additional URLs that would not otherwise be included in the sitemap. Place each URL on separate lines. Note that these URLs must match your board URL or they will not be included. Partial URLs will be converted to absolute URLs automatically.',
  'option_explain.spamDefaultOptions' => 'These are the default options that will be checked when running the spam cleaner. The individual who actually runs the spam cleaner will have the opportunity to alter these options.',
  'option_explain.spamMessageAction' => 'This controls what happens to messages made by spammers when the spam cleaner is applied against them. Note that if content does not support removal from view, it will be permanently deleted regardless of this setting.',
  'option_explain.spamPhrases' => 'When any of these phrases are entered in a message, the action below will be taken. Enter one phrase per line. You may use a * as a wild card to match any words. If you start the line with /, the line will be treated as a regular expression (example: /test/i).',
  'option_explain.spamThreadAction' => 'Điều này kiểm soát những gì xảy ra với chủ đề bắt đầu bởi người gửi thư rác khi trình lọc spam được áp dụng chống lại chúng.',
  'option_explain.spamUserCriteria' => 'The spam cleaner will only be available to act against users who meet these criteria. If any of these criteria are set to 0 (zero) they will be ignored.',
  'option_explain.stopForumSpam' => '',
  'option_explain.tagCloud' => 'If enabled, a tag cloud showing the most popular tags will be shown on the tag search page.',
  'option_explain.tagCloudMinUses' => 'Tags will not be shown in the tag cloud unless they have been used at least this many times.',
  'option_explain.tagLength' => 'This controls the minimum and maximum length of tags. Use 0 to disable a limit. Tags may never be longer than 100 characters. These limits only apply when a tag is created. Existing tags may always be used.',
  'option_explain.tagValidation' => '',
  'option_explain.templateHistoryLength' => 'The number of days to maintain template edit history records. Use 0 to never remove history.',
  'option_explain.termsLastUpdate' => 'The Unix time stamp of the last terms and rules update.',
  'option_explain.tosForceWhitelist' => 'If you decide to <a href="admin.php?force-agreement/terms" target="_blank">Force terms and rules agreement</a> then the routes listed here will bypass being redirected to the force agreement page. The route path is the section of the URL to a page after your main forum directory URL, such as forums/ or pages/page-name/. Do not reference a route filter here.',
  'option_explain.tosUrl' => 'Liên kết này sẽ được hiển thị ở chân trang và thành viên sẽ phải đồng ý với các điều khoản và nội quy trong quá trình đăng ký.',
  'option_explain.tumblrShare' => 'The Tumblr share button lets your users share pages to Tumblr.',
  'option_explain.tweet' => 'Enabling this button will allow your visitors to share pages easily using their Twitter account.<br />
<br />
You may also specify up to two Twitter accounts to recommend to visitors after they use the Tweet button. <a href="https://developer.twitter.com/en/docs/twitter-for-websites/web-intents/overview" target="_blank">More info...</a>',
  'option_explain.unsubscribeEmailAddress' => 'Some email clients support reading a <code>List-Unsubscribe</code> header within emails which enables them to display a prominent option to allow a user to unsubscribe from mailing lists. The mechanism for notifying you about a user\'s request to unsubscribe is an email sent to the address specified here.<br />
<br />
<b>Note:</b> Unless you enable "Automated unsubscribe email handler" below, it will be entirely your responsibility to manually check and process such emails, unless you are using a third party service that will do it for you. A value is required here if you enable the automated option.',
  'option_explain.upgradeCheckStableOnly' => 'When checking for upgrades, by default, we will only look for stable upgrades. Uncheck this box to include "Unsupported" upgrades too.',
  'option_explain.urlToPageTitle' => 'With this enabled, if a URL is used inside a message and is not given a title by the author, where possible the linked page\'s title will be fetched and used instead.<br />
<br />
Use the textbox above to specify a format. <b>{title}</b> will be replaced with the fetched page title and <b>{url}</b> will be replaced with the original URL. If no format is entered, the title itself will be displayed.',
  'option_explain.urlToRichPreview' => 'If a URL is inserted into a post it can automatically be "unfurled" to display a rich preview of the link contents, such as title, description and image.',
  'option_explain.useFriendlyUrls' => 'Nếu bạn bật tùy chọn này, các liên kết do hệ thống tạo sẽ không bao gồm "index.php?". Tuy nhiên, để kích hoạt tính năng này, mod_rewrite phải có sẵn và một tệp tin .htaccess thích hợp phải được đặt đúng chỗ.',
  'option_explain.userBanners' => '',
  'option_explain.userMentionKeepAt' => 'The @ character is used to initiate user mentions. If this option is disabled, successful user mentions will remove this character.',
  'option_explain.userTitleLadderField' => 'Các <a href="admin.php?user-title-ladder/">cấp bậc thành viên</a> sẽ sử dụng trường này để xác định cách thành viên lên bậc.',
  'option_explain.usernameChangeRecentLimit' => 'When a username is changed, the change will be indicated on the user\'s profile and the previous username will be visible until the change is no longer "recent" based on this option. Note that moderators will be able to see full username change histories. Users will be able to see their own full username change history. Set this to 0 to disable displaying username changes publicly.',
  'option_explain.usernameChangeRequireReason' => 'If enabled, the user will be required to provide a reason when requesting a username change.',
  'option_explain.usernameChangeTimeLimit' => 'Users will need to wait this number of days between username changes. If this is set to 0 users can change their username as frequently as they like.',
  'option_explain.usernameLength' => 'This controls the minimum and maximum length of usernames. Use 0 to disable a limit. Usernames may never be longer than 50 characters.',
  'option_explain.usernameReuseTimeLimit' => 'This controls how long a user must wait before they are able to pick a username that was recently used by another user. Set this to 0 to disable this feature.',
  'option_explain.usernameValidation' => '',
  'option_explain.watchAlertActiveOnly' => 'Nếu được kích hoạt, cảnh cáo nội dung và email được theo dõi sẽ chỉ được gửi đến người dùng đã truy cập trong một số ngày cụ thể. Điều này có thể cải thiện hiệu suất trên các cài đặt lớn hoặc rất hoạt động.',
  'option_explain.webShare' => 'On supported devices, this button will open the browser\'s web share prompt, allowing users to share the current page to other applications.',
  'option_explain.whatsAppShare' => 'Nếu người dùng nhấp vào nút này WhatsApp sẽ mở một danh sách người dùng chia sẻ URL trang và tiêu đề trang hiện tại.',
);