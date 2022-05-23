<div class="body_padded" style='direction:rtl;text-align: justify;'>
	<h1>مساعدة - هجوم القوة الغاشمة Brute Force (تسجيل الدخول)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>مساعدة</h3>
		<p >اختراق كلمة المرور هي عملية استعادة كلمات المرور من البيانات التي تم تخزينها أو نقلها بواسطة نظام الكمبيوتر.
تتمثل إحدى الطرق الشائعة في تخمين كلمة المرور بشكل متكرر.</p>

		<p >غالبًا ما يختار المستخدمون كلمات مرور ضعيفة. كاستخدام الكلمات الموجودة في القواميس أو أسماء العائلة أو أي كلمة مرور قصيرة جدًا (يُعتقد عادةً أنها أقل من 6 أو 7 أحرف) أو أنماط يمكن التنبؤ بها (مثل حروف العلة المتناوبة والحروف الساكنة، والتي تُعرف بـ  leetspeak ، لذلك "password" "تصبح "p@55w0rd").</p>

		<p >غالبًا ما يساعد إنشاء قوائم wordlists لكلمات المرور على زيادة فرصة اختراق كلمة المرور. هناك أدوات عامة لبناء قاموسًا يعتمد على مجموعة من مواقع الشركة وشبكات التواصل الاجتماعي الشخصية وغيرها من المعلومات الشائعة (مثل أعياد الميلاد أو سنة التخرج).

		<p >الخيار الأخير هو تجربة كل كلمة مرور ممكنة، والمعروفة باسم هجوم القوة الغاشمة Brute Force. من الناحية النظرية، إذا لم يكن هناك حد لعدد المحاولات، فإن هجوم القوة الغاشمة سيكون دائمًا هجوم ناج لأن قواعد كلمات المرور المقبولة يجب أن تكون معروفة للجمهور؛ ولكن كلما زاد طول كلمة المرور، زاد عدد كلمات المرور المحتملة مما يجعل وقت الهجوم أطول.</p>

		<br /><hr /><br />

		<h3>الهدف</h3>
		<p>الهدف الأساسي هو الحصول على كلمة مرور المسؤول عن طريق هجوم القوة الغاشمة. يمكن كمهمة إضافية محاولة الحصول على كلمات مرور الخاصة بالمستخدمين الأربعة في التطبيق!</p>

		<br /><hr /><br />

		<h3>المتوى المنخفض</h3>
		<p>لقد أغفل المطور تماماً <u>أي طريقة حماية</u>, مما يسمح لأي شخص بتجربة العديد من المرات كما يحلو له ، لتسجيل الدخول إلى أي مستخدم دون أي تداعيات.</p>

		<br />

		<h3>المستوى المتوسط</h3>
		<p>تضيف هذه المرحلة تأخيراً عند فشل تسجيل الدخول، وهذا يعني أنه عند فشل تسجيل الدخول عليك الانتظار لمدة ثانيتين إضافيتين قبل إعادة المحاولة.</p>

		<p>سيؤدي هذا إلى إبطاء مقدار الطلبات التي يمكن معالجتها لمدة دقيقة، مما يجعل القوة الغاشمة أطول.</p>

		<br />

		<h3>المستوى المرتفع</h3>
		<p>تم استخدام " anti Cross-Site Request Forgery (CSRF) token" ، هناك أسطورة قديمة مفادها أن هذه الحماية ستوقف هجمات القوة الغاشمة! <br>
يعتبر هذا المستوى امتداداً للمستوى المتوسط ، وذلك بوضع الانتظار عند فشل تسجيل الدخول ، ولكن هذه المرة يكون مقدار الوقت عشوائيًا بين ثانيتين وأربع ثوان. <br>
الفكرة من هذا هو محاولة تشتيت المهاجم وعدم تقديم معلومات عن مقدار التأخير.

</p>

		<p>يمكن أن يكون لاستخدام نموذج  <?php echo dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/CAPTCHA', 'CAPTCHA' ); ?> فعالية مماثلة  لاستخدام  CSRF token.</p>

		<br />

		<h3>المستوى المستحيل</h3>
		<p>يجب ألا تكون القوة الغاشمة (وتعداد المستخدم user enumeration) ممكنة في المستوى المستحيل. أضاف المطور ميزة "قفل" ، حيث إذا كان هناك خمس عمليات تسجيل دخول سيئة خلال آخر 15 دقيقة ، فلن يتمكن المستخدم الذي تم قفله من تسجيل الدخول.</p>

		<p>إذا حاول المستخدم المحظور تسجيل الدخول ، حتى باستخدام كلمة مرور صالحة ، فسيظهر أن اسم المستخدم أو كلمة المرور غير صحيحة. إن هذا الإجراء سيجعل من المستحيل معرفة ما إذا كان هناك حساب صالح على النظام ، بكلمة المرور هذه ، أو إذا كان الحساب مغلقًا.</p>

		<p>يمكن أن يتسبب هذا في "تعطيل الخدمة" (DoS) ، من خلال محاولة شخص ما باستمرار تسجيل الدخول إلى حساب شخص ما. يجب تمديد هذا المستوى عن طريق وضع المهاجم في القائمة السوداء blacklisting كالعناوين المنطقية Ips أو البلد.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>المراجع: <?php echo dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/Password_cracking' ); ?></p>
</div>
