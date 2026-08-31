# # ApproveTimesheetRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**timesheet_id** | **int** | ID of the timesheet to approve. |
**last_changed_at** | **\DateTime** | The timesheet&#39;s &#x60;hoursLastChangedAt&#x60; value as last fetched by the caller, in ISO 8601 UTC. This is specifically &#x60;hoursLastChangedAt&#x60;, not &#x60;updatedAt&#x60;: hours are stored separately, so the timesheet row&#39;s &#x60;updatedAt&#x60; may not move when hours change (and vice versa). The approval is rejected with 409 if the timesheet&#39;s hours changed after this instant, so callers never approve a version they have not seen. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
