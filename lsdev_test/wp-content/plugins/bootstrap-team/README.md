Bootstrap Team
==============
* Contributors: lsdev, iaincoughtrie
* Donate link: http://lsdev.biz
* Tags: teams, widget, shortcode, template-tag, feedback, customers
* Tested up to: 3.8.0
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

Creates a teams post type, and allows you to display teams on your site using a shortcode, template tag or widget. Designed to be used with the Bootstrap framework.

Shortcode:
==========
Insert the shortcode [team] into any post or page to display all teams.

Optional shortcode parameters:
------------------------------
- include: include specific team members by ID. 
	eg [team include="3, 5, 12"]

- size: set the size in pixels of the icon that displays on each team. 
	eg [team size=200]

- role: set the Role slug to display team members in that role only.
	eg [team role="role-slug"]

- responsive: choose whether the image size should adjust according to the viewport size.
	eg [team responsive=true]

- limit: set a limit on the number of teams that are returned (not necessary if already using the 'include' parameter).
	eg [team limit=5]

- columns: choose 2 to 4 column layout.
	eg [team columns=4]

- layout: 2 layouts to choose from, 'A' or 'B'
	eg [team layout='B']

- heading: whether to display the panel headers containing the member role
	eg [team heading=false]

- description: whether to display the team member descriptions
	eg [team description=false]

- social: whether to display the panels footers containing the social icons
	eg [team social=false]
            

Template tag:
=============
```
<?php
	if ( class_exists( 'BS_Team' ) ) {
        $BS_Team = new BS_Team();
        echo $BS_Team->output();
    };
?>
```

Optional template tag parameters:
--

The template tag accepts an array of the same parameters used in the shortcode.

eg:
```
<?php if ( class_exists( 'BS_Team' ) ) {
    	$BS_Team = new BS_Team();
    	echo $BS_Team->output(array(                                        
                        'size' => 150,
                        'responsive' => false,
                        'columns' => 3,
                        'limit' => 6
                        )
                    );                 
} ?>
```