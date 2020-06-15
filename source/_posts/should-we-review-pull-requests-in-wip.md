---
createdAt: 2020-03-01
title: Should we review Pull Requests in WIP?

---

It was Tuesday, I was working from home and started reviewing a pull request (PR) that was flagged as WIP (Work in Progress). It was a nice PR, changing some stuff on the way that we train our machine learning models. A new patch for the only commit came, changing some lines and specifically the one that I was commenting on. It was ok, I just left that comment and finished the review. But then I remembered, I already had that problem: the other company that I was working for had Gerrit to manage pull requests at that time, and, on Gerrit, you needed to add all your comments and then publish your review. Once I was reviewing a PR in which I already made some comments and got some references to make a more concrete code review and then the author sent a new patch... I got pissed, not because of the author's new patch, but with myself to have started reviewing a PR that was WIP, I needed to get some coffee.

So, as I already had this "bad experience" before, I raised the question: should we review PR's that are flagged as WIP? I wasn't sure, because we can create a PR for some other reasons than a review, sometimes just to run the pipeline and see if everything is working fine, also it can be a team/company agreement - every time you start a task, create a PR on WIP.

With this question in mind, I created a poll on twitter, I wanted to know other points of view about this.

<blockquote class="twitter-tweet"><p lang="en" dir="ltr">Do you think it&#39;s relevant to review pull requests in WIP or we should wait for the author to finalize it?</p>&mdash; Airton Zanon (@airtonzanon) <a href="https://twitter.com/airtonzanon/status/1219550706174234624?ref_src=twsrc%5Etfw">January 21, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

We got 53.6% for waiting for the pull request to become ready to review (not WIP) and 46.4% for reviewing it right away.

I got three answers that made me think about giving feedback as soon as possible:

<blockquote class="twitter-tweet" data-conversation="none"><p lang="en" dir="ltr">Depends on if the author requested it or not.</p>&mdash; Timothy Vernon (@tvernon_tech) <a href="https://twitter.com/tvernon_tech/status/1219558203626868736?ref_src=twsrc%5Etfw">January 21, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> <Paste>

<blockquote class="twitter-tweet" data-conversation="none"><p lang="en" dir="ltr">IMHO: Review as soon as you have a PR open, WIP or not. Feedback is good at any time of the process.</p>&mdash; Marabesi 💻🇧🇷 (@MatheusMarabesi) <a href="https://twitter.com/MatheusMarabesi/status/1219716849211977730?ref_src=twsrc%5Etfw">January 21, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 

<blockquote class="twitter-tweet" data-conversation="none"><p lang="en" dir="ltr">Early feedback is always good.<br>If you don&#39;t want a feedback, don&#39;t open a PR.<br>WIP PRs should have context described in the description (goal, what was done, what is yet to be done).<br>WIP should mean &#39;don&#39;t merge&#39; and &#39;review as not yet finished&#39;<br>;)</p>&mdash; Diego Rabatone (@diraol) <a href="https://twitter.com/diraol/status/1219919182332035072?ref_src=twsrc%5Etfw">January 22, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 

Giving feedback right away may give the author a good north to follow. Sometimes we start a PR knowing what is our goal, achieve the acceptance criteria for a new feature or correct some bug that we had in production, but sometimes an early feedback can help out the author to finish the task faster or give some tips about some other part of the system that might already do what the author is creating.

Also, Gabriel Caruso made a really good point about doing that:

<blockquote class="twitter-tweet" data-conversation="none"><p lang="en" dir="ltr">Review it if you have enough context to say: &quot;this is going on the wrong direction from what we discussed&quot; for example</p>&mdash; Caruso (@carusogabriel) <a href="https://twitter.com/carusogabriel/status/1219578740751192065?ref_src=twsrc%5Etfw">January 21, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 

Something I had already seen happening was a developer that as creating an event named "user changed status", to see how many times a user uses the new feature that changes the status on the system. The author didn't know that an event named "user interacted with system" existed on the project which accepted the values "action" and "category". The purpose that the developer needed the "user changed status" could be fulfilled with the "user interacted with system" passing the values "changed" and "status".

In this case, early feedback saved a lot of time for the author and if the reviewer didn't have this kind of context about events, they might have done a wrong review.

As I was thinking that making review on WIP PR's wouldn't be good, these points above really made me think that I was wrong. I had the opinion that I made on the start of this text, about getting changes when you're reviewing the PR could turn the review useless, but Bojan changed my mind with this tweet:

<blockquote class="twitter-tweet" data-conversation="none"><p lang="en" dir="ltr">My stance is that reviews are rarely useless 😁 I’ve learned so much from discussions sparked by PR’s, even those which seemed totally irrelevant! I’m a big fan of code review, btw 🤗</p>&mdash; Bojan Gvozderac (@GvozderacBojan) <a href="https://twitter.com/GvozderacBojan/status/1219561506867728384?ref_src=twsrc%5Etfw">January 21, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 

Taking this point of view, we can see that even when you do a review for a past patch, you might give some good information to the author to advance on their task or also to take this chance to learn some new stuff.

Rarely discussions (when engaged) on pull requests are a waste, they can help future developers that need to dig a little deeper on some part of the project. When a good conversation is made on a pull request, we can use that to understand why some decisions were made. I already found myself looking on an old PR because I wanted to understand why the author did something in the code. Of course the commit message should have given this information to me, but it's not always the case, but I'm leaving the focus of this text on WIP PRs.

One good point to consider if we should or shouldn't review a WIP PR is if the author asked for it, as Timothy says here:

<blockquote class="twitter-tweet" data-conversation="none"><p lang="en" dir="ltr">Yep. For me, unsolicited advice always takes more emotional energy to receive well. So for a PR, I generally wait until the author asks or removes the WIP unless I see something that is a big red flag or potential waste of time where raising the issue could help them.</p>&mdash; Timothy Vernon (@tvernon_tech) <a href="https://twitter.com/tvernon_tech/status/1219562517577576450?ref_src=twsrc%5Etfw">January 21, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 

That's a good point because sometimes when we give unsolicited feedback to someone's code it can not be received as good as we thought it would be. Sometimes the author creates a PR, do their own review and found that they needed to change some stuff, and if we point out these same changes on their code, it can not be received "well".

The conclusion that I got from this poll is that we could start reviewing a WIP PR if it is solicited. Then the author will wait until getting the feedback and will not send any new patches, the reviewer won't get "pissed", and the author can get some earlier thoughts on their PR to get forward on their task.

I've stopped reviewing WIP PR's that I don't get asked to give feedback, and I just wait for the PR to get the WIP solved. I usually like to read some WIP PR's, and if I get something that I find I could help with, I can send a message to the author and talk about it. It's more a request whether they need feedback or not and, when I do that, I don't do a deep review, commenting, etc... but getting an overview of the changes.

I hope that this text helps someone or just points out that we can make some agreements on how to review pull requests that are still on work in progress status.

