---
title: Testing a Process Build with scheduler on Apex (Salesforce)
tags:
    - process-builder
    - salesforce
    - test
    - apex
categories:
    - tutorial
---

## Scenario

You just created a Process Builder to run in 10 days and you would like to create an Apex test for it.

> I had this problem because in my current company we're trying to test for all new process builders that we create, and we created some to be run in some days.

### Problem

You can change the date of when the object was created, but even though, it won't work because the scheduler needs to wait an amount of time to run.

## Solution

Every time that we expect that a process builder runs, if it has no immediate actions, the process builder will create a record on `FlowInterview` table, this is a kind of queue.

So, after we run a test, and if we have a record in that table, it means that the scheduler worked.

The process builder setup was: Run every time that a task is created and will close it in 10 days if it still `Not Started`.

Then the test:
```java

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

It will create a task, notice that it's inside a `Test.startTest()` and `Test.closeTest()`, so when we insert the task, it will trigger the process builder, and below we'll assert if the scheduler worked or not.

## Conclusion

This test won't test what the process builder will do (which normally is what we do in this kind of tests), but it will test if the action of this process builder is scheduled, so if something changes, the process builder is inactive for some reason, or if it's not being scheduled anymore, the test will tell in the next deployment.

### Conslusion 1.1

Remember that every time that we deploy a process build, it'll be inactive, so to have the test for it, we need to deploy the process builder first, activate it and, then deploy the tests. (It's not the best scenarios of all, but, at least we'll have something testing the process builder).
