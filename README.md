# general_cardswipe
This is a generalized cardswipe setup that can be used for multiple labs and groups

## Overview:
Another lab in Fryklund liked how the CEE Lab tracked users and wanted to replicate it in their own lab. With that said, a few issues came up:
 - Most of the code will be identical, so it makes sense to have one repository. Updates should affect every lab, not just one.
 - Users should be shared between labs. That way, students register once with the Engineering Labs rather than with the CEE Lab, Machining Lab, etc.
 - It may be beneficial to make one cardswipe website, hosted on one machine, that has several specific lab pages. That way, all the website share the exact same code.
 - If there is only one host for all cardswipe websites, there absolutely must be website backups and a way to handle the event that the website can't connect
 - There may be a use for client/server hosts.
 - This will also affect MySQL database configurations

# Machine and Fabrication Lab

## Overview:
The Machining and Fabrication Lab in Fryklund likes the CEE Check-in Website. Their students currently sign in and sign out on a paper sheet. They would like us to set them up with another Linux server hosting a customized login site. There will be some code differences that need to be made.

## Requirements:
 - When students check in, they reserve a machine
 - The available machines should be available via a dropdown list
 - Students will need to swipe their card again to check out (and release the machine)
 - After three hours, automatially check students out and release the machine
 - All branding and naming on the site will be changed from "CEE Lab" to "Machining and Fabrication Lab"
 
 ## Machines:
  - Mill-Red
  - Mill-Blue
  - Mill-Green
  - Mill-Orange
  - Mill-Yellow
  - Mill Horizontal
  - NL-1
  - LL-1
  - DL-1
  - DL-2
  - DL-3
  - DL-4
  - DL-5
  - DL-6
  - SBL-1
  - SBL-2
  - SBL-3
  - SBL-4
  - CNM-1
  - CNM-2
  - CNM-3
  - CNM-4
  - CNM-5
  - CNL1
  - CNL-2
  - Vice-Area
  - Sheet-Metal
  - Capstone
  - MISC
