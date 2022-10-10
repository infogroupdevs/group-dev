const main = function (JQ) {
	let WIDTH_MOBILE = 320,
		WIDTH_TABLET = 768,
		WIDTH_DESKTOP = 1024,
		HEIGHT_WINDOW = 0,
		WIDTH_ACTUAL = JQ(window).width(),
		fn = {
			initialize: function () {
				fn = this;
				JQ(document).ready(fn.documentReady)
				JQ(window).on('load', fn.loadWindow)
				JQ(window).on('scroll', fn.loadScroll)
				window.addEventListener('resize', fn.resize);
			},
			documentReady: function () {
				JQ(document).on('click', '#js-open-menu', fn.openMenuRight)
				JQ(document).on('click', '#js-close-menu', fn.closeMenuRight)
			},
			resize: function () {
			},
			loadScroll: function () {
			},
			loadWindow: function () {
			},
			openMenuRight: function () {
				JQ('#js-menu-right').addClass('r-0')
			},
			closeMenuRight: function () {
				JQ('#js-menu-right').removeClass('r-0')
			}
		}
  fn.initialize()
  if (fn) return fn
}(jQuery)
