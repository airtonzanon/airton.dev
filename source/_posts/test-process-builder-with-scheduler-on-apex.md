---
createdAt: 2019-08-05
title: Testing a Process Builder with scheduler on Apex (Salesforce)

---

## Scenario

You just created a Process Builder to run 10 days in advance and you would like to create an Apex test for it.

> I had this problem because in my current company we're trying to create tests for all new process builders.

#### Problem

If you change the date of when the object was created it won't work, because the scheduler needs to wait an amount of time to run.

## Solution

Every time we expect that a process builder runs, if it has no immediate actions, the process builder will create a record on `FlowInterview` table, which is a kind of queue.

So, if after we run a test we have a record in that table, it means that the scheduler worked.

The process builder setup was: Run every time that a task is created and will close it in 10 days if it still `Not Started`.

Then the test:

```apex

@isTest
public class VerifyProcessBuilderTest {
    @isTest
    public static void verifySchedulerCreated() {
        Task task = new Task(
            Subject = 'Call Airton',
            RecordTypeId = '000a00000000AAA',
            Status = 'Not Started',
            Priority = 'High',
            Type = 'Call'
        );

        Test.startTest();

        insert task;

        List<FlowInterview> flowInterviews = [SELECT Id FROM FlowInterview];
        System.assertEquals(1, flowInterviews.size());
        Test.stopTest();
    }
}

```

This will create a task, but notice that it's between `Test.startTest()` and `Test.closeTest()` calls, so when we insert the task, it will trigger the process builder, and below we'll assert if the scheduler worked or not.

## Conclusion

This test won't test what the process builder will do (which normally is what we do in this kind of tests), but it will test if the action of this process builder is scheduled, so if something changes, the process builder is inactive for some reason, or if it's not being scheduled anymore, the test will tell in the next deployment.

#### Conslusion 1.1

Remember that every time we deploy a process builder, it'll be inactive, so for the test to run well, we need to deploy the process builder first, activate it and then deploy the tests. (It's not the best scenario of all, but, at least we'll have something testing the process builder).

If you don't want to have this problem, please read this [release note](https://releasenotes.docs.salesforce.com/en-us/winter19/release-notes/rn_forcecom_flow_deploy_as_active.htm "Salesforce release article") from Salesforce.

### Update 12-08-2019

Some days ago a peer was talking to me about a test that wasn't passing because it found some rows on `FlowInterview` table, that was trick, because it was supposed to have no rows there, after an investigation on our Process Builders we found the problem, we forgot to disable a process builder that we wouldn't use anymore. So that's the beauty of this test, we can find if something is triggering something else that shouldn't.

Also, I would like to mention that every time that a new test runs, it will clear all the database, in other words, the table `FlowInterview` will be empty when you run a new test, and it will just have content if some process builder has a scheduler.
