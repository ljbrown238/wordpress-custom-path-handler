# WordPress Plugin: WordPress Custom Path Handler

This plugin demonstrates the use of a simple class that provides handling of a custom path.

The path does not need to exist in WordPress.  If the path already exists in WordPress, this handler will display the custom content and the existing POST or PAGE will be ignored.
If there is another endpoint created by another plugin, results will depend on the handler priorities.

Usage is simple: create a new instance of CustomPathHandler passing in the 'slug' (path) to be handled, followed by a callback the user will define to generate the custom output.

Three examples are used in this test code.  Generating a small PDF, PNG, and sample JSON output from the WordPress Options table.

