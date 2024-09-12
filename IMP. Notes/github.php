
=================================================================================
1. Add SSH KEY to GitLab and Clone a repo

    1. First Login Github / Gitlab
    2. Get Access to repository
    3. Add SSH Key key 
        - Get/ generate SSH Key, in your gitkraken: Setting > SSH > Generate new or copy prev. Public key
        - Go to Github/ Github : Profile > Preference > SSH Key     (can be change in github, current path is for gitlab)
        - Click on add new key
        - Paste that public here, give it a title
        - Done

    4. Clone the repository
        - Go to repo. 
        - Click on code, select "clone with SSh" from the dropdown
        - In Git kraken click on clone 
        - Select Path and paste "clone with SSh" - Url 
        - Click clone repo, Done.

    5. Gitflow initialize   --IMP.
        - you must be check in to Master
        - Go to Setting > Gitflow > initialize git flow

    

    Notes: 
    What is SSH Key:
    It is basically a combination 2 key public and private, Public key work as Lock, that you can share to any server such as github and gitlab.
    Private key work as actual "key" that basically decripts the data sent by public key from server (in an encrypted format). 
    And That's this works in very secure way, no possiblities for any hacking attack.