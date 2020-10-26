# Category tree resolver

- This simple application is dedicated to resolve problem of adding category names to a nested category tree
- The problem was solved with the help of recursion, in order to handle any given tree depth
- The exact content of this assignment can be found under the docs directory

## Installation & requirements

- Only php 7.4 is required
- If you don't have it locally, you can use attached docker container just enter
``` ./run``` command in project directory and then enter the container with ```docker exec -it container_name bash```
- Install dependencies with composer: ```composer install``` and you are ready to go

## Usage

```
 php bin/console resolve-tree-task
```