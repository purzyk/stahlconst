module.exports = {
  /**
   * Define your assets path here. Assets path are your theme
   * path without host.
   * E.g. your theme path is http://test.dev/wp-content/themes/wptheme/
   * then your assets path is /wp-content/themes/wptheme/
   *
   * This is for Webpack that it can handle assets relative path right.
   */
  assetsPath: '/wp-content/themes/wptheme/',

  /**
   * Define here your dev server url here.
   *
   * This is for Browsersync.
   */
  devUrl: 'https://stahlconst.dev',

  /**
   * You can whitelist selectors to stop purgecss from removing them from your CSS
   *
   * whitelist: ['random', 'yep', 'button']
   * In the example, the selectors .random, #yep, button will be left in the final CSS
   */
  whitelist: [],
};