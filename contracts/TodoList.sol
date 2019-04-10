pragma solidity ^0.5.0;

contract TodoList {
  uint public Count = 0;

  struct Task{
    uint id;
    string name;
    string branch;
    string interest;
    string cgpa;
    string intern;
    string tech1;
    string tech2;
  }

  mapping (uint => Task) public tasks;

  event TaskCreated(
    uint id,
    string name,
    string branch,
    string interest,
    string cgpa,
    string intern,
    string tech1,
    string tech2
  );

  event TaskCompleted(
    uint id
  );

  constructor() public{
    createTask("sonu", "it", "10", "sports", "1", "ML", "data analytics");
  }

  function createTask(string memory _name, string memory _branch, string memory _interest, string memory _cgpa, string memory _intern, string memory _tech1, string memory _tech2) public {
    Count ++;
    tasks[Count] = Task(Count, _name, _branch, _interest, _cgpa, _intern, _tech1, _tech2);
    emit TaskCreated(Count, _name, _branch, _interest, _cgpa, _intern, _tech1, _tech2);
  }

  function toggleCompleted(uint _id) public{
    Task memory _task = tasks[_id];
    tasks[_id] = _task;
    emit TaskCompleted(_id);
  }
}
