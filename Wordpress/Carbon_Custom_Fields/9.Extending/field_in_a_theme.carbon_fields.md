[Documentation](https://carbonfields.net/docs/) > Extending > Field In A Theme

# Field In A Theme

Carbon Fields allows you to define custom fields inside your theme if you have theme-specific fields that you do not intend to distribute separately:

1. Execute `git clone https://github.com/htmlburger/carbon-field-template.git --single-branch --depth 1 includes/my-field` in your theme dir

2. Delete the `includes/my-field/.git` directory

3. Add the following to your theme’s composer.json:

   ```
   "autoload": {
       "files": [
           "./includes/my-field/field.php"
       ],
       "psr-4": {
           "Carbon_Field_YOURFIELDNAME\\": "./includes/my-field/core/"
       }
   }
   ```

4. Call `composer dumpautoload`

5. Browse to the `includes/my-field` directory

6. Call `npm install`

7. Edit `includes/my-field/webpack.config.js` and adjust the `const root` variable to point to the directory of Carbon Fields (e.g. `const root = path.resolve(__dirname, '../../vendor/htmlburger/carbon-fields');`)

8. Call `npm run build`

9. You now have a local custom field running from your theme

10. If the field is theme-specific and will not be distributed separately feel free to delete the `composer.json` and `composer.lock` files.